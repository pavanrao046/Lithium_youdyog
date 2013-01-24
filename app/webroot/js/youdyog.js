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
			$.post('/getPrivateGroups',{},function(data){
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
		$('#groupsList').on('click', '.btnJoinPublicGroup', function(){
			$.post('/addUserToPublicGroup', {groupId: $(this).attr('id')}, function(data){
				location.reload();
			});
			return true;
		});
		
		// remove user from public group
		$('#groupsList').on('click', '.btnUnjoinPublicGroup', function(){
			$.post('/removeUserFromPublicGroup', {groupId: $(this).attr('id')}, function(data){
				location.reload();
			});
			return true;
		});
		
		//get members of a public group
		$('#groupsList').on('click', '.publicGroup',function(){
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
		
		// get the searched groups 
		$('#txtSearchGroup').submit(function(){
			var groupName = $(this).val();
			alert(groupName);
			$.post('/searchGroup',{group_name : groupName}, function(data){
				console.log(data);
			});
			return false;
		});		
		$('#btnSearchGroup').click(function(){
			var groupName = $('#txtSearchGroup').val();
			$.post('/searchGroup',{group_name : groupName}, function(data){
				var newdata = jQuery.parseJSON(data);
				console.log(newdata.length);
				$('#groupsList').html('');
				$('#groupLegend').html('<a href="/getPublicGroups" onclick=""> Groups </a> | Search Results for "'+groupName+'"');
				if(newdata.length == 0)
				{
					$('#groupsList').append('<h5><span style="color:#6F6F6F;">No matching groups.</span><h5>');
				}
				else{
					for(var i=0;i<newdata.length;i++)
					{
						$('#groupsList').append('<div class="listDiv"> <a class="publicGroup" data-name="'+newdata[i]['group_name']+'" href="" id="'+newdata[i]['id']['$id']+'">'+newdata[i]['group_name']+'</a>');
						if(newdata[i]['isMember'] == "1"){
							$('#groupsList').append("<button class='btn btn-success pull-right btnUnjoinPublicGroup' style='margin-top : -50px;' id='"+newdata[i]['id']['$id']+"'> UnJoin </button></div>");					
						}
						else{
							$('#groupsList').append("<button class='btn btn-success pull-right btnJoinPublicGroup' style='margin-top : -50px;' id='"+newdata[i]['id']['$id']+"'> Join </button></div>");
						}					
					}
				}
			});
			return false;
		});
		
		// delete a group
		$('#groupsList').on('click','.btnDeleteGroup',function(){
			var groupId = $(this).attr('id');
			$.post('/deleteGroup',{groupId : groupId},function(data){
				console.log(data);
				if(data == '0')
				{
					$('#myGroupsAlert').attr('class','alert alert-danger');
					$('#myGroupsAlert').css('display','block');
					$('#myGroupsAlert').html('<strong> Oops! </strong> Something terribly went wrong. Please try after sometime.');
					$('#myGroupsAlert').hide().fadeIn(300);
				}
				else
				{
					location.reload();
				}
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

