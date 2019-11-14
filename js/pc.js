     // $(function(){
        //     $(".menu > ul").eq(0).show();
        //     $(".menu h3").click(function(){
        //         $(this).next().stop().slideToggle();
        //         $(this).siblings().next("ul").stop().slideUp();
        //     });
        //     $(".menu > ul > li > a").click(function(){
        //     	var index=$(this).index();
        //         $(this).addClass("selected").parent().siblings().find("a").removeClass("selected");
        //         $(this).addClass("active").parent().siblings().find("a").removeClass("active");

        //     })
        // });
		$(document).ready(function(){

			function myfunction(li,li_a,menu_tab){
				li.click(function(){
				var index=$(this).index();
				menu_tab.eq(index).addClass("active").siblings().removeClass("active");
				li_a.removeClass("selected");
				li_a.eq(index).addClass("selected").siblings().removeClass("selected");

			});
			}

			myfunction($(".containers .menu .ulmenu1 li"),$(".containers .ulmenu1 li a"),$(".containers .content .menu1 .tab"));
			myfunction($(".containers .menu .ulmenu2 li"),$(".containers .ulmenu2 li a"),$(".containers .content .menu2 .tab"));
			myfunction($(".containers .menu .ulmenu3 li"),$(".containers .ulmenu3 li a"),$(".containers .content .menu3 .tab"));


			// var li1=$(".containers .menu ul li");
			// var lia=$(".containers .menu ul li a");
			// var tab1=$(".containers .content .menu1 .tab ");

			// li1.click(function(){
			// 	var index=$(this).index();

			// 	tab1.eq(index).addClass("active").siblings().removeClass("active");
			// 	lia.removeClass("selected");
			// 	lia.eq(index).addClass("selected").siblings().removeClass("selected");
			// });

			$(function(){            //ul/li的折叠效果
				$(".menu > ul").eq(0).show();
				 $(".menu h3").click(function(){
				 		//找menu对应的tab
				 		$(".menu_tab > div").removeClass("active");

				 		var val=($(this).next().attr('class'));
				 		var menu_value=(val.substring(val.length-1));
				 		$(".containers .content .menu"+menu_value+" .tab:first-child").addClass("active");
				 		$(".containers .menu .ulmenu"+menu_value+" li>a").removeClass("selected");
				 		$(".containers .menu .ulmenu"+menu_value+" li a").eq(0).addClass("selected");//默认设置为被选中状态


				 		// $("."+"val").child().child().("selected")

				 			//这是ul收缩效果
				            $(this).next().stop().slideToggle();
				            $(this).siblings().next("ul").stop().slideUp();

				           // if($(".containers .ulmenu"+menu_value+" li ").find("a").attr("class")==="selected"){
				           // 		$(".containers .content .menu"+menu_value+" .tab:first-child")
				           // }
			            });

			});

			$(function(){   // 导航 >
				 $(".containers .menu > h3").click(function(){

				 	$(".containers .content .A1").empty().text($(this).text());

				 });
			});
		});



