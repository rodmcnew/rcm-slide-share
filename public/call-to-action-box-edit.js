/**
 * RcmSlideShare
 *
 * JS for editing RcmSlideShare
 *
 * PHP version 5.3
 *
 * LICENSE: No License yet
 *
 * @category  Reliv
 * @author    Rod McNew <rmcnew@relivinc.com>
 * @copyright 2012 Reliv International
 * @license   License.txt New BSD License
 * @version   GIT: <git_id>
 */
var RcmSlideShareEdit = function (instanceId, container) {

    var self = this;

    /**
     * jQuery object for the two links
     *
     * @type {Object}
     */
    var aTags = container.find('a');

    /**
     * Background image jQuery object
     *
     * @type {Object}
     */
    var imgTag = container.find('.rollImg');

    /**
     * cleanImageUrl
     * @param url
     * @returns {string}
     */
    self.cleanBackgroundUrl = function(background) {
        var reg = /(?:\(['|"]?)(.*?)(?:['|"]?\))/;
        return reg.exec(background)[1];
    };

    /**
     *  Gets background image url
     *
     * @returns {String}
     */
    self.getBackgroundImageUrl = function () {

        var background = imgTag.css('background-image');
        return self.cleanBackgroundUrl(background);
    };

    /**
     * Called by content management system to make this plugin user-editable
     */
    self.initEdit = function () {

        //Double clicking will show properties dialog
        container.dblclick(self.showEditDialog);

        //Add right click menu
        $.contextMenu({
            selector: rcm.getPluginContainerSelector(instanceId),
            //Here are the right click menu options
            items: {
                edit: {
                    name: 'Edit Properties',
                    icon: 'edit',
                    callback: function () {
                        self.showEditDialog();
                    }
                }

            }
        });
    };

    /**
     * Called by content management system to get this plugins data for saving
     * on the server
     *
     * @return {Object}
     */
    self.getSaveData = function () {
        return {
            'href': aTags.attr('href'),
            'imageSrc': self.getBackgroundImageUrl()
        }
    };

    /**
     * Displays a dialog box to edit href and image src
     */
    self.showEditDialog = function () {

        var srcInput = $.dialogIn('image', 'Image', self.getBackgroundImageUrl());
        var hrefInput = $.dialogIn('url', 'Link Url', aTags.attr('href'));

        var form = $('<form></form>')
            .addClass('simple')
            .append(srcInput, hrefInput)
            .dialog({
                title: 'Properties',
                modal: true,
                width: 620,
                buttons: {
                    Cancel: function () {
                        $(this).dialog("close");
                    },
                    Ok: function () {

                        //Get user-entered data from form
                        imgTag.css('background-image', 'url("' + srcInput.val() + '")');
                        aTags.attr('href', hrefInput.val());

                        $(this).dialog('close');
                    }
                }
            }
        );
    };
};