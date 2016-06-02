<?php
class Wsu_Themecontrol_Block_Adminhtml_System_Config_Form_Field_Color extends Mage_Adminhtml_Block_System_Config_Form_Field {
    /**
     * Add color picker
     *
     * @param Varien_Data_Form_Element_Abstract $element
     * @return String
     */
    protected function _getElementHtml(Varien_Data_Form_Element_Abstract $element) {
        $html   = $element->getElementHtml(); //Default HTML
		$value = $element->getEscapedValue();
        if (Mage::registry('colorPickerLoaded') == false) {
            $html .= '
			<script type="text/javascript" src="/js/wsu/spectrum/js/spectrum.js"></script>
			<link rel="stylesheet" type="text/css"  href="/js/wsu/spectrum/css/spectrum.css" media="all"/> 
			';
            Mage::register('colorPickerLoaded', 1);
        }
        $html .= '
			<script type="text/javascript">
				jQuery(function($){
					$("#' . $element->getHtmlId() . '").spectrum({
						color: "'.$value.'",
						showInput: true,
						showAlpha:true,
						className: "full-spectrum",
						showInitial: true,
						showPalette: true,
						showSelectionPalette: true,
						maxSelectionSize: 10,
						preferredFormat: "hex",
						localStorageKey: "spectrum.wsumage",
						move: function (color) {
							
						},
						show: function () {
						
						},
						beforeShow: function () {
						
						},
						hide: function () {
						
						},
						change: function() {
							
						},
						palette: [
                            //crimson
							["rgb(152 30 50)", "rgb(198 12 48)"],
                            
                            //green
							["rgb(143 126 53)", "rgb(173 164 0)", 
                             "rgb(244 242 235)", "rgb(227 223 205)", "rgb(203 196 162)", "rgb(175 163 112)",
                             "rgb(114 101 42)", "rgb(86 76 32)", "rgb(57 50 21)"],
                            
                             //orange
							["rgb(182 114 51)", "rgb(211 130 53)", 
                             "rgb(248 241 235)", "rgb(237 220 204)", "rgb(221 190 161)", "rgb(203 155 110)",
                             "rgb(146 91 41)", "rgb(109 68 31)", "rgb(73 46 20)"],
                             
                             //blue
							["rgb(79 134 142)", "rgb(0 165 189)",
                             "rgb(237 243 244)", "rgb(211 225 227)", "rgb(174 199 203)", "rgb(130 169 175)",
                             "rgb(63 107 114)", "rgb(47 80 85)", "rgb(32 54 57)"],
                            
                            //yellow
							["rgb(198 146 20)", "rgb(255 184 28)",
                             "rgb(249 244 231)", "rgb(241 228 196)", "rgb(229 205 147)", "rgb(215 178 88)",
                             "rgb(158 117 16)", "rgb(119 88 12)", "rgb(79 58 8)"],
                            
                            //gray
							["rgb(94 106 113)", "rgb(255 255 255)",
                             "rgb(239 240 241)", "rgb(215 218 219)", "rgb(181 186 190)", "rgb(141 149 154)",
                             "rgb(70 78 84)", "rgb(42 48 51)", "rgb(0 0 0)"],
						]
					});

				});
			</script>
        ';
        return $html;
    }
}
