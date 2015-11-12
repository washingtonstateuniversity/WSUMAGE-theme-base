{% markdown %}
# WSU Magento Theme Controller installation

## Installation with Gitploy
There is a simple bash script, [gitploy](https://github.com/jeremyBass/gitploy), that is used for the install and updating of the files needs for a Magento app.  [gitploy](https://github.com/jeremyBass/gitploy) is used to manage the install of the app.  This script will take a git repository and clone it to the server.  To avoid issues and the need for over use of submodules, gitploy tracks the local repository in a sub folder and sets things up do that you never have to worry about the install becoming corrupted.  For more information on how gitploy works please refer to the documentation.  The command that is normally run in get the up today Magento app is something like:

`gitploy add wsu_base https://github.com/washingtonstateuniversity/WSUMAGE-theme-base.git`

What that command will do is to clone in the repo for the latest tag of the theme.  The `-t latest` option will chose the last tagged release. 

## Activating

### Setting the package
To get started, travel to the package field in the settings area of the admin

***`System> Configuration> General> Design> Package`***

![set the package](site/images/set-the-theme-package.png)

In order to activate the theme, use `wsu_base` for the package.  Any child themes would extend this package in order to maintain functionality.

### Setting a child Theme
Setting a child theme (***which must be correctly set up itself***) is as easy as setting the default theme.  This means you will be able to have grandchild themes which can be useful when dealing with a network of `stores` under one `website`.

***`System> Configuration> General> Design> Themes`***

![set child theme](site/images/set-the-theme-child.png)


**Note:** More to come. Thank you for reading.
	
{% endmarkdown %}
