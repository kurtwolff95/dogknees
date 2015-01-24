jQuery(function() 
{
    //Set up variables
    var screenwidth = jQuery(document).outerWidth();
    var screenpixelratio = window.devicePixelRatio;
    console.log('Screen Width: ' + screenwidth);
    console.log('Screen Pixel Ratio: ' + screenpixelratio);

    //If element is clicked, run scrollToTop() 
    jQuery('.backtotop').on('click', scrollToTop);
 
    function scrollToTop() 
    {
        verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0;
        element = jQuery('body');
        offset = element.offset();
        offsetTop = offset.top;
        jQuery('html, body').animate({scrollTop: 0}, 500, 'linear');
    }
    function devicecheck() 
        {
            //Mobile Device
            if(screenpixelratio > 1)
            {
                jQuery("#menu-main").hide();
                jQuery(".mtoggle").click(function() 
                {
                    if(jQuery("#menu-main").css('display') == 'none') 
                    {
                        jQuery("#menu-main").css('display', 'inline-block');
                    } 
                    else 
                    {
                        jQuery("#menu-main").css('display', 'none');
                    }
                });
                //if (window.console) console.log('Mobile Device, DPR: ' + screenpixelratio);
            }
            //Computer with small window width
            if((screenwidth <= 550) && (screenpixelratio <= 1))
            {
                jQuery('#navbuttonimgcont').css('display', 'inline-block');
                jQuery("#menu-main").hide();
                jQuery(".mtoggle").click(function() 
                {
                    if(jQuery("#menu-main").css('display') == 'none') 
                    {
                        jQuery("#menu-main").css('display', 'inline-block');
                    } 
                    else 
                    {
                        jQuery("#menu-main").css('display', 'none');
                    }
                });
                if (window.console) console.log('Computer Small, DPR: ' + screenpixelratio);
            }
            //Computer with larger width 
            if ((screenwidth >= 550) && (screenpixelratio <= 1))
            {
                jQuery('#navbuttonimgcont').css('display', 'none')
                jQuery("#menu-main").show();
                //if (window.console) console.log('Computer Wide, DPR: ' + screenpixelratio);
            }
        }
    //If the user is one mobile, hide the menu by default
    jQuery(document).ready(function() 
    {
        devicecheck();
    });
    jQuery(window).resize(function()
    {
        //Everytime we resize the window, we need set the screenwidth variable again
        screenwidth = jQuery(document).width();
        devicecheck();
    })
    //On page load run admincheck function, set the sticky offset to equal the height of the navigation bar if the bar is fixed
    jQuery(window).bind("load", function() 
    {
        admincheck();
        if(jQuery('#wpadminbar').css('position') == 'fixed') 
        {
            jQuery('.stickyalias').css('height', jQuery('#widebarcont').outerHeight());
        }
    });
    function admincheck()
    {
        if(jQuery('#pushnavigationbar').length) 
        { 
            updatestickybarAdmin();
        }
        else 
        { 
            updatestickybar();
        }
    }

    function updatestickybarAdmin() 
    {
        jQuery('.stickyalias').css('height', jQuery('#widebarcont').outerHeight());
        if(jQuery('#wpadminbar').css('position') == 'fixed') 
        {
            var sticknavlimit = jQuery('#header').outerHeight();
            jQuery('#pushnavigationbar').css('height', jQuery('#wpadminbar').height());
            jQuery('#pushnavigationbar').css('display', 'block');
        } 
        else 
        {
            var sticknavlimit = jQuery('#header').outerHeight() + jQuery('#wpadminbar').outerHeight();
            jQuery('#pushnavigationbar').css('display', 'none');
        }
        
        if(jQuery(window).scrollTop() >= sticknavlimit) 
        {
            if(jQuery('#wpadminbar').css('position') == 'fixed') 
            {
                jQuery('#pushnavigationbar').css('height', jQuery('#wpadminbar').height());
                jQuery('#pushnavigationbar').css('display', 'block');
            } 
            else 
            {
                jQuery('#pushnavigationbar').css('height', jQuery('#wpadminbar').height());
                jQuery('#pushnavigationbar').css('display', 'none');
            }
            jQuery('#pushnavigationbar').css('height', jQuery('#wpadminbar').height());
            jQuery('.fullnavigationbar').css({position: 'fixed', top: '0px'});
            jQuery('#navigationtitleimage').addClass('scrollactive');
        } 
        else 
        {
            jQuery('#pushnavigationbar').css('height', jQuery('#wpadminbar').height());
            jQuery('#pushnavigationbar').css('display', 'none');
            jQuery('.fullnavigationbar').css({position: 'relative', top: '0px'});
            jQuery('#navigationtitleimage').removeClass('scrollactive');
        }
    }

    function updatestickybar() 
    {
        jQuery('.stickyalias').css('height', jQuery('#widebarcont').outerHeight());
        var sticknavlimit = jQuery('#header').outerHeight();
        if(jQuery(window).scrollTop() >= sticknavlimit) 
        {
            jQuery('.fullnavigationbar').css({position: 'fixed', top: '0px'});
            jQuery('#navigationtitleimage').addClass('scrollactive');
        } 
        else 
        {
            jQuery('.fullnavigationbar').css({position: 'relative', top: '0px'});
            jQuery('#navigationtitleimage').removeClass('scrollactive');
        }
    }
    
        // Check the postion of the Header and offset (admin bar)
    jQuery(window).resize(function()
    {
        admincheck();
    });

    jQuery(window).scroll(function()
    {
        admincheck();
    });
  });