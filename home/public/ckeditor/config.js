/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
  
    //设置宽高
    config.width=550;
    config.height=200;

    //工具栏是否可以被收缩 
    // config.toolbarCanCollapse = true; 

    // 屏蔽换行符<br>
    config.enterMode = CKEDITOR.ENTER_BR;    
    // 屏蔽段落<p>
    config.shiftEnterMode = CKEDITOR.ENTER_P;  

    //直接搞成源码模式
    // config.startupMode = 'source';  
      

    config.toolbar_MyToolbar =     
        [     
            ['Source','-','Save','Preview','Print'],     
            ['Cut','Copy','Paste','PasteText','PasteFromWord','-','Scayt']       
        ];     
};
