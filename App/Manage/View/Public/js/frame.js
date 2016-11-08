$(function(){

    $(".left").niceScroll({
        cursorcolor: "#ccc",//#CC0071 光标颜色 
        cursoropacitymax: 0.5, //改变不透明度非常光标处于活动状态（scrollabar“可见”状态），范围从1到0 
        cursorwidth: "8px", //像素光标的宽度 
        cursorborder: "0", //     游标边框css定义 
        cursorborderradius: "5px",//以像素为光标边界半径 
        autohidemode: false //是否隐藏滚动条 
    });

    var menuTipIndex = 0;
    $('.nav ul li a').on({
        mouseover:function(){
            var title = $(this).attr('data-title');
            menuTipIndex = layer.tips(title, $(this),{tips:[1,'rgba(45,195,232,0.8)'],time:false});
        },
        mouseout:function(){
            layer.close(menuTipIndex);
        }
    });

		//菜单切换(测试)
		bindAdminMenu();
		ChangeNav("left_menu_0");

		//菜单开关
		LeftMenuToggle();

		//全部功能开关
		//AllMenuToggle();

		//取消菜单链接虚线
		$(".head").find("a").click(function(){$(this).blur()});
		$(".menu").find("a").click(function(){$(this).blur()});
		get_cate();	


	});


	
	function get_cate(){
		var url = $('#menu').attr('data-url');
		$.get(url,
            {
                'pid' : 0, 
                'rnd' : Math.floor(111+Math.random()*100000)
            },
            function(data){
                var listUl = $('#dl_items_2_0 ul');
                if(!isNaN(data.count) && data.count>0){
                	listUl.text('');
                }
                if(data.list && (typeof data.list == 'object')){
                    $.each(data.list, function(i, v){
                        var html = '<li><a href="'+v.url+'" target="main">'+v.name+'</a></li>';
                        listUl.append(html);
                    });
                }
                               
            },'json');
	}



	function bindAdminMenu(){
		$("#nav").find("a").click(function(){
			ChangeNav($(this).attr("_for"));
			//$('#main').get(0).src = $(this).attr("href");
		});

		$("#menu").find("dt").click(function(){
			dt = $(this);
			dd = $(this).next("dd");
			if(dd.css("display")=="none"){
				dd.slideDown("fast");
				dt.css("background-position","right -130px");
			}else{
				dd.slideUp("fast");
				dt.css("background-position","right -163px");
			}
		});

		//动态元素添加的也能触发
		$('#menu dd ul').on('click',"li a",function(){
			$(this).addClass("thisclass").blur().parents("#menu").find("ul li a").not($(this)).removeClass("thisclass");
		}); 

	}

	function ChangeNav(nav){//菜单跳转
		$("#nav").find("a").removeClass("thisclass");
		$("#nav").find("a[_for='"+nav+"']").addClass("thisclass");//.blur();
		$("body").attr("class","showmenu");
		$("#menu").find("div[id^=items]").hide();
		$("#menu").find("#items_"+nav).show().find("dl dd").show().find("ul li a").removeClass("thisclass");//.blur();
	}

	function LeftMenuToggle(){
		$("#togglemenu").click(function(){
			if($("body").attr("class")=="showmenu"){
				$("body").attr("class","hidemenu");
				$(this).addClass('thisclass').attr('data-title',"显示菜单");
			}else{
				$("body").attr("class","showmenu");
				$(this).removeClass('thisclass').attr('data-title',"隐藏菜单");
			}
            layer.closeAll();
		});
	}


	function AllMenuToggle(){
		mask = $(".pagemask,.iframemask,.allmenu");
		$("#allmenu").click(function(){
				mask.show();
		});
		//mask.mousedown(function(){alert("123");});
		mask.click(function(){mask.hide();});
	}
