
(function($) { // when jQuery is loaded

    $.flexwork = $.flexwork || { cache: {} };

    ( function( factory ) {
        if ( typeof define === "function" && define.amd ) {
            // AMD. Register as an anonymous module.
            define( [ "jquery", "./version" ], factory );
        } else {
            // Browser globals
            factory( jQuery );
        }
    } ( function( $ ) {
        return jQuery.fn.extend( {
            uniqueId: ( function() {
                var uuid = 0;
                return function() {
                    return this.each( function() {
                        if ( !this.id ) {
                            this.id = "fw-trc-" + ( ++uuid );
                        }
                    } );
                };
            } )(),
            removeUniqueId: function() {
                return this.each( function() {
                    if ( /^fw-trc-\d+$/.test( this.id ) ) {
                        $( this ).removeAttr( "id" );
                    }
                } );
            }
        } );
    } ) );
    /**
     * Refresh a snapshot of stored jQuery selector data.
     *
     * Not all stored object properties would normally be reflected when
     * the original selector is modified. This ensures we capture the
     * latest version.
     *
     * @returns {*}
     */
    $.fn.refresh = function() {
        var elems;
        elems = $( this.selector );
        this.splice( 0, this.length );

        try {
            this.push.apply( this, elems );
        }
        catch ( err ) {
            if ( $( this.selector ).html() !== "" ) {
                return $( this.selector );
            }else {
                return $( "<div>" );
            }
        }
        return this;
    };


    /**
     * Use MutationObserver to watch for any changes to a specific DOM element and trigger
     * the passed callback when a change is made.
     *
     * This is currently only used within the Spine to watch `#glue` for changes such as
     * menu expansion, etc...
     *
     * @param obj
     * @param callback
     */
    $.observeDOM = function( obj, callback ) {
        var current_obj = obj.refresh();
            current_obj = $(current_obj).remove(".dont-observe").refresh();
        if( ! $.observeDOM_checking ){
            var config, mutationObserver;
            $.observeDOM_checking = true;

            if ( window.MutationObserver ) {
                config = {
                    childList: true,
                    attributes: true,
                    subtree: true,
                    attributeOldValue: true,
                    attributeFilter: [ "class", "style" ]
                };

                mutationObserver = new MutationObserver( function( mutationRecords ) {
                    var fire_callback = false; // Assume no callback is needed.

                    $.each( mutationRecords, function( index, mutationRecord ) {
                        if ( mutationRecord.type === "childList" ) {
                            if ( mutationRecord.addedNodes.length > 0 ) {
                                fire_callback = true;
                            } else if ( mutationRecord.removedNodes.length > 0 ) {
                                fire_callback = true;
                            }
                        } else if ( mutationRecord.type === "attributes" ) {
                            if ( mutationRecord.attributeName === "class" ) {
                                fire_callback = true;
                            }
                        }
                    } );

                    // If one of our matched mutations has been observed, fire the callback.
                    if ( fire_callback ) {
                        callback();
                    }
                    $.observeDOM_checking = false;
                } );
                mutationObserver.observe( current_obj[0], config );
            } else {
                // Set a fallback function to fire every 200ms and watch for DOM changes.
                window.setTimeout( function() {
                    //console.log(obj);


                    if ( window.obj_watch !== current_obj[ 0 ].innerHTML ) {
console.log("<<<<<<<--------------------------------------");
console.log("Not A match");
console.log("window.obj_watch");
console.log(window.obj_watch);
console.log("current_obj[ 0 ].innerHTML");
console.log(current_obj[ 0 ].innerHTML);
console.log("window.obj_watch === current_obj[ 0 ].innerHTML");
console.log(window.obj_watch === current_obj[ 0 ].innerHTML);
console.log("-------------------------------------->>>>>>>");
                    }else{
                        //console.log("<<<<<<<--------------------------------------");
                        //console.log("FULL MATCH");
                        //console.log("-------------------------------------->>>>>>>");
                    }

                    //console.log("time");
                    if ( typeof window.obj_watch === "undefined" ) {
                        console.log("obj_watch undefined");
                        window.obj_watch = current_obj[ 0 ].innerHTML;
                    }

                    /**
                     * If the current object does not match the object we're watching, assume
                     * a DOM mutation has occurred and fire the callback.
                     */

                    //console.log(current_obj);
                    if ( window.obj_watch !== current_obj[ 0 ].innerHTML ) {
                        console.log("obj_watch callback");
                        callback();
                    }

                    window.obj_watch = current_obj[ 0 ].innerHTML;
                    //console.log("obj_watch setting");

                    // Reset observation on the current object.
                    $.observeDOM_checking = false;
                    $.observeDOM( current_obj, callback );
                }, 200 );
            }
        }
    };
    $.observeDOM_checking = false;

    $.expr[":"].regex = function(elem, index, match) {
        var matchParams = match[3].split(","),
            validLabels = /^(data|css):/,
            attr = {
                method: matchParams[0].match(validLabels) ?
                            matchParams[0].split(":")[0] : "attr",
                property: matchParams.shift().replace(validLabels,"")
            },
            regexFlags = "ig",
            regex = new RegExp(matchParams.join("").replace(/^\s+|\s+$/g,""), regexFlags);
        return regex.test(jQuery(elem)[attr.method](attr.property));
    };

    $.flexwork.map = {"thirds":33.333,"fourths":25,"fifths":20,"sixths":16.666,"eigths":12.5,"ninths":11.111,"tenths":10,"twelfths":8.333};

    /**
     * Equalize columns in a layout.
     */
    $.flexwork.equalizing = function() {
        var containers;

        //if ( $( ".flex-row,.row-reverse, .flex-column, .column-reverse" ).length ) {
        //if ( $( "[data-uid^='fw-trc-']" ).length ) {
            containers = $( ".flex-row,.row-reverse, .flex-column, .column-reverse" );
            //$('body').css( "min-height", 0 );
            $( "[data-uid]" ).css( "min-height", "" );
            /*containers.children().css( "min-height", "0" );
            containers.children(".grid_part").css( "min-height", "0" );

            containers.find("[data-row_id*='']").css( "min-height", "0" );*/


            containers.each( function() {
                var container = $( this );
                var items = container.children();

                var row_mark = 5; // not 0 but 5 for fault tolerence
                var container_id = 0;
                var tallestBox = 0;
                var heights=[];
                var container_width = container.outerWidth();
                items.each( function() {
                    var item = $( this );
                    row_mark += item.outerWidth();
                    item.attr("data-row_id",container_id);
                    item.attr("data-container", container.attr("id") );
                    tallestBox = ( $( this ).outerHeight() > tallestBox ) ? $( this ).outerHeight() : tallestBox;
                    heights[container_id]=tallestBox;
                    if(row_mark >= container_width ){
                        row_mark = 5;
                        tallestBox = 0;
                        container_id++;
                    }
                } );
                $.each(heights,function(idx,height){
                    container.find("[data-row_id='"+idx+"']").not( ".unequaled" ).css( "min-height", height );
                });
               // $( "section.equalize .column", this ).css( "min-height", "auto" );
            } );




            $(":regex(class,h-([\\w-]+?)-(\\d{1,2})$)").each(function(){
                var re = /h-([\w-]+?)-?(\d{1,2})$/gim;
                var found = re.exec( $(this).attr("class") );
                var type = found[1];
                var times = found[2];
                var taken = $.flexwork.map[type] * times;
                $(this).css( "min-height", $(this).parent().outerHeight() * (taken/100) );
            });

            $(".h-full-height").each(function(){
                if( "absolute" !== $(this).css("position") && "fixed" !== $(this).css("position") ){
                    $(this).css( "min-height", $(this).parent().outerHeight() );
                }
            });

        //}
    };
    $(document ).on("flexwork:preped",function(){
        console.log("flexwork:preped");
        $( "[data-uid]" ).css( "min-height", "" );
    });
    $(document ).on("flexwork:init",function(){
        console.log("flexwork:init");
        $.flexwork.equalizing();
        $.observeDOM( $( ".flex-row, .row-reverse, .flex-column, .column-reverse, .grid-part" ), function(){
            $.flexwork.prep();
            console.log("equalizing ");
            $.flexwork.equalizing();
        });
    });

}(jQuery));
