$(document).ready(function(){
	$(".lmb").append("<div class=\"load_more_button\"><div class=\"button\" id=\"load_more\" data-val = \"0\">Lae veel kuulutusi</div></div>");
	view(0);
        $("#load_more").click(function(e){
            e.preventDefault();
            var segmentnumber = $(this).data("val");
            view(segmentnumber);
        });
 
    });
 
    function view(segmentnumber, c){
    if($("#load_more").data("val") >= 2){ //30 kuulutust 체hel lehel, siis viskame lehek체lje vahetamise lingid ka juurde ja kaotame laadimise nupu 채ra...
            	document.getElementById("load_more").style.visibility = "hidden";
            }    
            var href = window.location.href;
            var segments = href.split('/');
            var offset = segments.pop();
            var category = segments.pop();
            if(isNaN(offset)){
            	category = offset;
            	offset = 0;
            }            
        $.ajax({
            url:"http://ostunurk.cs.ut.ee/index.php/item/getstuff",
            type:"GET",
            data: {segmentnumber:segmentnumber,
            	   offset:offset,
            	   category:category},
            error: function(xhr,error){
            	console.log(xhr);
            	console.log(error);
            }
            
        }).done(function(response){
	if($("#count").data("count") < 10){
        	document.getElementById('load_more').style.visibility = 'hidden';
        	$(".load_more_button").append("Kuulutused said otsa...");
        }
            $("#ajax_table").append(response);
            $("#load_more").data("val", ($("#load_more").data("val")+1));
        });
    };