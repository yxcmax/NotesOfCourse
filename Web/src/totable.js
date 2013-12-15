/**
* Helper functions that take an array and generate table(bootstrap).
* Not templated.
* @MaxYuan
*/


/**
* @data   The array of data
* @target A string containing the id attribute of the target table container
*/
function totable(data,target){
	var table_container = document.getElementById(target);
  table_container.innerHTML="";
	table_container.setAttribute("class","panel panel-default");
  //table_container.setAttribute("class","table-responsive");
	//var table_heading = document.createElement("div");
	//table_heading.setAttribute("class","panel-heading");
	//table_heading.appendChild(document.createTextNode("Search results"));
	//table_container.appendChild(table_heading);
  //var mytable_resp = document.createElement("div");
  //mytable_resp.setAttribute("class","table-responsive");
	var mytable = document.createElement("table");
	mytable.setAttribute("class","table table-hover");
  var thead = document.createElement("thead");
  var tbody = document.createElement("tbody");
  mytable.appendChild(thead);
  mytable.appendChild(tbody);
	var t_header_row = document.createElement("tr");
	for(var key in data[0]){
    if(key!="CourseLink"){
  		var th = document.createElement("th");
  		th.appendChild(document.createTextNode(key));
  		t_header_row.appendChild(th);
    }
	}
	thead.appendChild(t_header_row);
	for(var i=0;i<data.length;i++){
		var t_body_row = document.createElement("tr");
		for(var key in data[i]){
      if(key!="CourseLink"){
  			var td = document.createElement("td");
        td.appendChild(donode(key,data[i]));
  			t_body_row.appendChild(td);
      }
		}
		tbody.appendChild(t_body_row);
	}
  //mytable_resp.appendChild(mytable);
	table_container.appendChild(mytable);
}


/**
* Wrapper function for totable
* @data   The array of data
* @target A string containing the id attribute of the target table container
* @pager  A string containing the id attribute of the target pager container
* @max_entries  Maximum number of results to be displayed on one page
*/
function totable_wrapper(data, target, pager, max_entries){
  var length = data.length;
  var table_container = document.getElementById(target);
  table_container.innerHTML="";
  if(length==0){
    table_container.appendChild(document.createElement("p").appendChild(document.createTextNode("No results can be displayed.")));
    return;
  }
  var num_pages = Math.ceil(length/max_entries);
  totable(data.slice(0,max_entries),target);
  var btn_group = document.createElement("div");
  btn_group.setAttribute("class", "btn-group");
  var pager_obj = document.getElementById(pager);
  pager_obj.innerHTML="";
  pager_obj.appendChild(btn_group);
  for(var i=0;i<num_pages;i++){
    var page_btn = document.createElement("button");
    page_btn.setAttribute("class", "btn btn-default");
    //page_btn.setAttribute("onclick", "totable("+data+".slice("+(i*max_entries)+","+((i+1)*max_entries)+"), '"+target+"');");
    $(page_btn).on("click",{data : data, itr : i},function(e){
      //alert(e.data.itr);
      var i=e.data.itr;
      var data=e.data.data;
      totable(data.slice(i*max_entries,(i+1)*max_entries), target);
    });
    page_btn.appendChild(document.createTextNode(i+1));
    btn_group.appendChild(page_btn);
  }
}


function donode(key, data){
  if(key=="Link"){
    var btn = document.createElement("button");
    btn.setAttribute("type","button");
    btn.setAttribute("class","btn btn-primary");
    btn.setAttribute("onclick","window.open('"+data[key]+"');");
    btn.appendChild(document.createTextNode("Link"));
    return btn;
  }else if(key=="SectionName"){
    var link = document.createElement("a");
    link.setAttribute("onclick","window.open('"+data["CourseLink"]+"');");
    link.setAttribute("class","text-primary");
    link.appendChild(document.createTextNode(data[key]));
    return link;
  }else if(key=="Preview"){

  }
  return document.createTextNode(data[key]);
}

/*
function mynode(drinkName){
  //<div>
  var dpdown = document.createElement("div");
  dpdown.setAttribute("class","dropdown");
  //<a>
  var link = document.createElement("a");
  link.setAttribute("id",drinkName);
  link.setAttribute("role","button");
  link.setAttribute("data-toggle","dropdown");
  link.setAttribute("data-target","#");
  link.setAttribute("href","./");
  link.appendChild(document.createTextNode(drinkName));
  //<ul>
  var menu = document.createElement("ul");
  menu.setAttribute("class","dropdown-menu");
  menu.setAttribute("role","menu");
  menu.setAttribute("aria-labelledby",drinkName);
  //<li>s
  var detail = document.createElement("li");
  var detail_link = document.createElement("a");
  detail_link.setAttribute("onclick","viewDrink('"+drinkName+"')");
  detail_link.appendChild(document.createTextNode("View details"));
  detail.appendChild(detail_link);
  var rate = document.createElement("li");
  var rate_link = document.createElement("a");
  rate_link.setAttribute("data-toggle","modal");
  rate_link.setAttribute("data-target","#myModal");
  rate_link.appendChild(document.createTextNode("Rate this drink"));
  $(rate_link).on("click",{value:drinkName},function(e){
    $("#ratingTitle").html("Rate "+drinkName);
    drink_to_rate=drinkName;
    $.post("rate.php",{'drinkName':drinkName},function(data){
      document.getElementById("rateDrink").setAttribute("value",data);
    });
  });
  rate.appendChild(rate_link);

  menu.appendChild(detail);
  menu.appendChild(rate);
  dpdown.appendChild(link);
  dpdown.appendChild(menu);

  return dpdown;

  /*
  <div class="dropdown">
    <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
      this drink
    </a>
    <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
      <li>abc</li>
      <li>123</li>
    </ul>
  </div>
  */
//}
