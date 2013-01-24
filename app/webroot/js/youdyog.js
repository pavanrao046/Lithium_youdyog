$(document).ready(function(){

		// hide the unwanted contents at the load-time
		$('#errorAlert').css("display", "none");
		$('#alertDiv').css("display", "none");	
		
		
		
		// set nav-bar item active according to the current url
		var pathname = window.location.pathname;
		
		if(pathname == '/connect'){
			$('#homeNav').attr('class','active');
		}
		else if(pathname == '/connect/connections'){
			$('#friendsNav').attr('class','active');
		}
		else if(pathname == '/connect/about'){
			$('#aboutNav').attr('class','active');
		}
		else{
		
		}
		
		// connect to a user
		$('.connect').click(function(){		
			$.post('/connect',{id:$(this).attr('id')},function(data){
				console.log(data);
				if(data == '1')
				{
					$('#searchResults').html("Connected Successfully.");
				}
				else
				{
					$('#searchResults').html("Connection failed!");
				} 
			});
			return false;
		});
		
		// load all groups when groups button is ready
		$('.btnAction').ready(function(){				
			$.post('/getGroups',{},function(data){
				var newdata = jQuery.parseJSON(data);
				for(var i=0;i<newdata.length;i++){
					$('.groups').append("<li> <a href='#' id='"+newdata[i]+"' class='groupItem'>"+newdata[i]+"</a> </li>");
				}
			});	
			return false;	
		});
		
		
		// override close dropdown on click of add new group text box
		$('.txtGroupName').click(function(){
			return false;		
		});
		
		// show create new group text box on click of create new group option
		$('#createGroup').click(function(){
			$('#txtGroupName').css('display','block');
			$('#txtGroupName').hide().fadeIn(300);		
			return false;
		});
		
		// update DB with new group when create new group text box is submitted
		$('.frmNewGroup').submit(function(){
			$.post('/addGroup', {group : $('#txtGroupName').val()} , function(data){
				var newdata = jQuery.parseJSON(data);
				var userid = $(this).closest('div.groups').attr('data-id');
				$('.groups').html('');
					for(var i=0;i<newdata.length;i++){
						$('.groups').append("<li> <a href='#' id='"+newdata[i]+"' class='groupItem'>"+newdata[i]+"</a> </li>");				
					}
					$('#txtGroupName').val('');		
			});
			return false;	
		});	
		
		// add user to a group		
		$( '.groups' ).on( 'click', '.groupItem', function () { 
			var userid = $(this).closest('div.groups').attr('data-id');
			var groupName = $(this).attr('id');
			$.post('connections/addUserToGroup', {userid: userid, group: groupName}, function(data){
				
			});
		});
		
		// add user to a public group
		$('.btnJoinPublicGroup').click(function(){
			$.post('/addUserToPublicGroup', {groupId: $(this).attr('id')}, function(data){
				location.reload();
			});
			return true;
		});
		
		// remove user from public group
		$('.btnUnjoinPublicGroup').click(function(){
			$.post('/removeUserFromPublicGroup', {groupId: $(this).attr('id')}, function(data){
				location.reload();
			});
			return true;
		});
		
		//get members of a public group
		$('.publicGroup').click(function(){
			var id = $(this).attr('id');
			var groupName = $(this).attr('data-name');
			$.post('/getMembers',{groupId : id}, function(data){
				var newdata = jQuery.parseJSON(data);
				$('#groupsList').html('');
				$('#groupLegend').html('<a href="/getPublicGroups" onclick=""> Groups </a> | Members for '+groupName);
				for(var i=0;i<newdata.length;i++)
					$('#groupsList').append('<div class="listDiv"> <a href=""> '+newdata[i]+' </a></div>');
			});
			return false;
		});
		
		
		
		// get assigned groups for users
		/*
		$( '.groups' ).ready(function () { 
			$('.groups').each(function(index){
				var userid = $(this).attr('data-id');
				$.post('connections/getUserGroups', {userid: userid}, function(data){
					//console.log(data);
					var newdata = jQuery.parseJSON(data);
					for(var i=0;i<newdata.length;i++){
						$('.groupLabel'+userid).append('<span class="label label-info">'+newdata[i]+'</span>');
						console.log(userid+"  :  "+newdata[i]);
					}
				});
			});			
		});
		*/
});

