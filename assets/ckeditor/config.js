/**

 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.

 * For licensing, see LICENSE.md or http://ckeditor.com/license

 */



CKEDITOR.editorConfig = function( config ) {

	// Define changes to default configuration here. For example:

	// config.language = 'fr';

	// config.uiColor = '#AADC6E';

	var newURL = window.location.protocol + "//" + window.location.host;

	config.filebrowserBrowseUrl = newURL+'/whatyouneedforyoursite/browse.php?type=files';

   	config.filebrowserImageBrowseUrl = newURL+'/whatyouneedforyoursite/browse.php?type=images';

    config.filebrowserFlashBrowseUrl = newURL+'/whatyouneedforyoursite/browse.php?type=flash';

    config.filebrowserUploadUrl = newURL+'/whatyouneedforyoursite/upload.php?type=files';

    config.filebrowserImageUploadUrl = newURL+'/whatyouneedforyoursite/upload.php?type=images';

    config.filebrowserFlashUploadUrl = newURL+'/whatyouneedforyoursite/upload.php?type=flash';

};

