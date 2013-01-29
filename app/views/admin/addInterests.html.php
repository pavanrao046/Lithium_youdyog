<?php

?>

<div id="interestsWrapper" class="wrapper">
<legend> Manage Interests </legend>

	<ul id="myTab" class="nav nav-tabs">
    		<li class="active"><a href="#managehows" data-toggle="tab" id="managehowstab">How</a></li>
            <li class=""><a href="#managewheres" data-toggle="tab" id="managewherestab">Where</a></li>
    </ul>
    
    <div id="myTabContent" class="tab-content">
              <div class="tab-pane fade in active" id="managehows">
              	<div style="margin-bottom : 10px;"><a href="#createHowModal" title="Create New How" data-toggle="modal" data-target="#createHowModal" id="createHow" class="btn"> <i class="icon-plus-sign"> </i> </a></div>
              	<div class="well" id="managehowscontent"></div>
              </div>
              <div class="tab-pane fade" id="managewheres">
              	<div style="margin-bottom : 10px;"><a href="#createWhereModal" title="Create New Where" data-toggle="modal" data-target="#createWhereModal" id="createWhere" class="btn"> <i class="icon-plus-sign"> </i> </a></div>
              	<div class="well" id="managewherescontent"></div>
              </div>
    </div>
    
</div> <!-- end interestsWrapper div -->

<!-- Modal Hows -->
<div id="createHowModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 id="myModalLabel">Create New How</h4>
  </div>
  <div class="modal-body">
  <center>
    <form id="frmNewHow" class="frmNewHow">
    				<input type="text" id="txtHowName" class="txtHowName" placeholder="Enter How Name" style="display : block;" />
    				<input type="submit" class="btn btn-success" data-dismiss="modal" aria-hidden="true" value="Create" />
    </form>
  </div>
  <div class="modal-footer">
  </div>
</div>


<!-- Modal Wheres -->
<div id="createWhereModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 id="myModalLabel">Create New Where</h4>
  </div>
  <div class="modal-body">
  <center>
    <form id="frmNewWhere" class="frmNewWhere">
    				<input type="text" id="txtWhereName" class="txtWhereName" placeholder="Enter Where Name" style="display : block;" />
    				<input type="submit" class="btn btn-success" data-dismiss="modal" aria-hidden="true" value="Create" />
    </form>
  </div>
  <div class="modal-footer">
  </div>
</div>

