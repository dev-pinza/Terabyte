<?php
include("header.php");
?>
<!-- activty -->

<!-- END -->
<div class="email-app todo-box-container">
				<!-- ============================================================== -->
	            <!-- Left Part -->
	            <!-- ============================================================== -->
	            <div class="left-part list-of-tasks">
	                <a class="ti-menu ti-close btn btn-success show-left-part d-block d-md-none" href="javascript:void(0)"></a>
	                <div class="scrollable" style="height:100%;">
	                    <div class="p-3">
	                        <a class="waves-effect waves-light btn btn-info d-block" href="javascript: void(0)" id="add-task">Add New Task</a>
	                    </div>
	                    <div class="divider"></div>
	                    <ul class="list-group">
	                        <li>
	                            <small class="p-3 grey-text text-lighten-1 db">Folders</small>
	                        </li>
	                        <li class="list-group-item">
	                            <a href="javascript:void(0)" class="todo-link active list-group-item-action" id="all-todo-list"><i class="mdi mdi-format-list-bulleted"></i> All Tasks <span class="todo-badge badge badge-info float-right"></span></a>
	                        </li>
	                        <li class="list-group-item">
	                            <a href="javascript:void(0)" class="todo-link list-group-item-action" id="current-task-important"> <i class="mdi mdi-star"></i> Important <span class="todo-badge badge badge-warning float-right"></span></a>
	                        </li>
	                        <li class="list-group-item">
	                            <a href="javascript:void(0)" class="todo-link list-group-item-action" id="current-task-done"> <i class="mdi mdi-send"></i> Complete <span class="todo-badge badge badge-success float-right"></span></a>
	                        </li>
	                        <li class="list-group-item">
	                            <hr>
	                        </li>
	                        <li class="list-group-item">
	                            <a href="javascript:void(0)" class="list-group-item-action" id="current-todo-delete"> <i class="mdi mdi-delete"></i> Trash </a>
	                        </li>
	                    </ul>
	                </div>
	            </div>
	            <!-- ============================================================== -->
                <!-- Right Part -->
                <!-- ============================================================== -->
                <div class="right-part mail-list bg-white overflow-auto">
                	<div id="todo-list-container">
                		<div class="p-3 border-bottom">
	                    	<div class="input-group searchbar">
							  	<div class="input-group-prepend">
							    	<span class="input-group-text" id="search"><i class="icon-magnifier text-muted"></i></span>
							  	</div>
							  	<input type="text" class="form-control" placeholder="Search Tasks Here" aria-describedby="search">
							</div>
	                    </div>
	                    <!-- Todo list-->
	                    <div class="todo-listing">
	                    	<div id="all-todo-container" class="p-3">
	                    		<!-- Item 1 -->
	                    		<div class="todo-item all-todo-list p-3 border-bottom position-relative">
	                    			<div class="inner-item d-flex align-items-start">
	                    				<div class="w-100">
		                    				<!-- Checkbox -->
		                    				<div class="custom-control custom-checkbox d-flex align-items-start">
												<input type="checkbox" class="custom-control-input" id="checkbox1">
												<label class="custom-control-label" for="checkbox1"></label>
												<div>
													<div class="content-todo">
														<h5 class="font-medium font-16 todo-header mb-0" data-todo-header="Meeting with Mr.Jojo Sukla at 5.00PM">Meeting with Mr.Jojo Sukla at 5.00PM</h5>
														<div class="todo-subtext text-muted" 
															data-todosubtext-html="<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. </p>" 
															data-todosubtextText='{"ops":[{"insert":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. \n"}]}'>
															Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. 
														</div>
														<span class="todo-time font-12 text-muted"><i class="icon-calender mr-1"></i>14 Fab 2020</span>
													</div>
												</div>
												<div class="ml-auto">
													<div class="dropdown-action">
														<div class="dropdown todo-action-dropdown">
													  		<button class="btn btn-link text-dark p-1 dropdown-toggle text-decoration-none todo-action-dropdown" type="button" id="more-action-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													    		<i class="icon-options-vertical"></i>
													  		</button>
													  		<div class="dropdown-menu dropdown-menu-right" aria-labelledby="more-action-1">
													    		<a class="edit dropdown-item" href="javascript:void(0);"><i class="fas fa-edit text-info mr-1"></i> Edit</a>
													    		<a class="important dropdown-item" href="javascript:void(0);"><i class="fas fa-star text-warning mr-1"></i> Important</a>
													    		<a class="remove dropdown-item" href="javascript:void(0);"><i class="far fa-trash-alt text-danger mr-1"></i>Remove</a>
													    		<a class="dropdown-item permanent-delete" href="javascript:void(0);"><i class="fas fa-trash text-danger mr-1"></i>Permanent Delete</a>
                                                        		<a class="dropdown-item revive" href="javascript:void(0);"><i class="fas fa-undo-alt text-success mr-1"></i>Revive Task</a>
													  		</div>
														</div>
													</div>
												</div>
											</div>
											<!-- Content -->											
	                    				</div>
	                    			</div>
	                    		</div> <!-- ./Item 1 -->
	                    		<!-- Item 2 -->
	                    		<div class="todo-item all-todo-list p-3 border-bottom position-relative current-task-done">
	                    			<div class="inner-item d-flex align-items-start">
	                    				<div class="w-100">
		                    				<!-- Checkbox -->
		                    				<div class="custom-control custom-checkbox d-flex align-items-start">
												<input type="checkbox" class="custom-control-input" id="checkbox2" checked>
												<label class="custom-control-label" for="checkbox2"></label>
												<div>
													<!-- Content -->
													<div class="content-todo">
														<h5 class="font-medium font-16 todo-header mb-0" data-todo-header="Book a ticket at night">Book a ticket at night</h5>
														<div class="todo-subtext text-muted" 
															data-todosubtext-html="<p>Blandit tempus porttitor aasfs. Integer posuere erat a ante venenatis tempus porttitor aasfs. Integer posuere erat a ante venenatis.  </p>" 
															data-todosubtextText='{"ops":[{"insert":"Blandit tempus porttitor aasfs. Integer posuere erat a ante venenatis tempus porttitor aasfs. Integer posuere erat a ante venenatis.  \n"}]}'>
															Blandit tempus porttitor aasfs. Integer posuere erat a ante venenatis tempus porttitor aasfs. Integer posuere erat a ante venenatis. 
														</div>
														<span class="todo-time font-12 text-muted"><i class="icon-calender mr-1"></i>01 Jan 2020</span>
													</div>
												</div>
												<div class="ml-auto">
													<div class="dropdown-action">
														<div class="dropdown todo-action-dropdown">
													  		<button class="btn btn-link text-dark p-1 dropdown-toggle text-decoration-none todo-action-dropdown" type="button" id="more-action-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													    		<i class="icon-options-vertical"></i>
													  		</button>
													  		<div class="dropdown-menu dropdown-menu-right" aria-labelledby="more-action-2">
													    		<a class="edit dropdown-item" href="javascript:void(0);"><i class="fas fa-edit text-info mr-1"></i> Edit</a>
													    		<a class="important dropdown-item" href="javascript:void(0);"><i class="fas fa-star text-warning mr-1"></i> Important</a>
													    		<a class="remove dropdown-item" href="javascript:void(0);"><i class="far fa-trash-alt text-danger mr-1"></i>Remove</a>
													    		<a class="dropdown-item permanent-delete" href="javascript:void(0);"><i class="fas fa-trash text-danger mr-1"></i>Permanent Delete</a>
                                                        		<a class="dropdown-item revive" href="javascript:void(0);"><i class="fas fa-undo-alt text-success mr-1"></i>Revive Task</a>
													  		</div>
														</div>
													</div>
												</div>
											</div>
	                    				</div>
	                    			</div>
	                    		</div> <!-- ./Item 2 -->
	                    		<!-- Item 3 -->
	                    		<div class="todo-item all-todo-list p-3 border-bottom position-relative current-task-important">
	                    			<div class="inner-item d-flex align-items-start">
	                    				<div class="w-100">
		                    				<!-- Checkbox -->
		                    				<div class="custom-control custom-checkbox d-flex align-items-start">
												<input type="checkbox" class="custom-control-input" id="checkbox3">
												<label class="custom-control-label" for="checkbox3"></label>
												<div>
													<!-- Content -->
													<div class="content-todo">
														<h5 class="font-medium font-16 todo-header mb-0" data-todo-header="Give Review for design in Xtreme Vue Admin">Give Review for design in Xtreme Vue Admin</h5>
														<div class="todo-subtext text-muted" 
															data-todosubtext-html="<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue.Integer posuere erat a ante venenatis tempus porttitor aasfs. Integer posuere erat a ante venenatis. </p>" 
															data-todosubtextText='{"ops":[{"insert":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue.Integer posuere erat a ante venenatis tempus porttitor aasfs. Integer posuere erat a ante venenatis. \n"}]}'>
															Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Integer posuere erat a ante venenatis tempus porttitor aasfs. Integer posuere erat a ante venenatis.
														</div>
														<span class="todo-time font-12 text-muted"><i class="icon-calender mr-1"></i>19 Mar 2020</span>
													</div>
												</div>
												<div class="ml-auto">
													<div class="dropdown-action">
														<div class="dropdown todo-action-dropdown">
													  		<button class="btn btn-link text-dark p-1 dropdown-toggle text-decoration-none todo-action-dropdown" type="button" id="more-action-3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													    		<i class="icon-options-vertical"></i>
													  		</button>
													  		<div class="dropdown-menu dropdown-menu-right" aria-labelledby="more-action-3">
													    		<a class="edit dropdown-item" href="javascript:void(0);"><i class="fas fa-edit text-info mr-1"></i> Edit</a>
													    		<a class="important dropdown-item" href="javascript:void(0);"><i class="fas fa-star text-warning mr-1"></i> Important</a>
													    		<a class="remove dropdown-item" href="javascript:void(0);"><i class="far fa-trash-alt text-danger mr-1"></i>Remove</a>
													    		<a class="dropdown-item permanent-delete" href="javascript:void(0);"><i class="fas fa-trash text-danger mr-1"></i>Permanent Delete</a>
                                                        		<a class="dropdown-item revive" href="javascript:void(0);"><i class="fas fa-undo-alt text-success mr-1"></i>Revive Task</a>
													  		</div>
														</div>
													</div>
												</div>
											</div>
	                    				</div>
	                    			</div>
	                    		</div> <!-- ./Item 3 -->
	                    		<!-- Item 4 -->
	                    		<div class="todo-item all-todo-list p-3 border-bottom position-relative current-todo-delete">
	                    			<div class="inner-item d-flex align-items-start">
	                    				<div class="w-100">
		                    				<!-- Checkbox -->
		                    				<div class="custom-control custom-checkbox d-flex align-items-start">
												<input type="checkbox" class="custom-control-input" id="checkbox4">
												<label class="custom-control-label" for="checkbox4"></label>
												<div>
													<!-- Content -->
													<div class="content-todo">
														<h5 class="font-medium font-16 todo-header mb-0" data-todo-header="Give salary to employee">Give salary to employee</h5>
														<div class="todo-subtext text-muted" 
															data-todosubtext-html="<p>Integer posuere erat a ante venenatis.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. </p>" 
															data-todosubtextText='{"ops":[{"insert":"Integer posuere erat a ante venenatis.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. \n"}]}'>
															Integer posuere erat a ante venenatis.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. 
														</div>
														<span class="todo-time font-12 text-muted"><i class="icon-calender mr-1"></i>31 Jan 2020</span>
													</div>
												</div>
												<div class="ml-auto">
													<div class="dropdown-action">
														<div class="dropdown todo-action-dropdown">
													  		<button class="btn btn-link text-dark p-1 dropdown-toggle text-decoration-none todo-action-dropdown" type="button" id="more-action-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													    		<i class="icon-options-vertical"></i>
													  		</button>
													  		<div class="dropdown-menu dropdown-menu-right" aria-labelledby="more-action-4">
													    		<a class="edit dropdown-item" href="javascript:void(0);"><i class="fas fa-edit text-info mr-1"></i> Edit</a>
													    		<a class="important dropdown-item" href="javascript:void(0);"><i class="fas fa-star text-warning mr-1"></i> Important</a>
													    		<a class="remove dropdown-item" href="javascript:void(0);"><i class="far fa-trash-alt text-danger mr-1"></i>Remove</a>
													    		<a class="dropdown-item permanent-delete" href="javascript:void(0);"><i class="fas fa-trash text-danger mr-1"></i>Permanent Delete</a>
                                                        		<a class="dropdown-item revive" href="javascript:void(0);"><i class="fas fa-undo-alt text-success mr-1"></i>Revive Task</a>
													  		</div>
														</div>
													</div>
												</div>
											</div>
	                    				</div>
	                    			</div>
	                    		</div> <!-- ./Item 4 -->
	                    		<!-- Item 5 -->
	                    		<div class="todo-item all-todo-list p-3 border-bottom position-relative current-task-important">
	                    			<div class="inner-item d-flex align-items-start">
	                    				<div class="w-100">
		                    				<!-- Checkbox -->
		                    				<div class="custom-control custom-checkbox d-flex align-items-start">
												<input type="checkbox" class="custom-control-input" id="checkbox5">
												<label class="custom-control-label" for="checkbox5"></label>
												<div>
													<!-- Content -->
													<div class="content-todo">
														<h5 class="font-medium font-16 todo-header mb-0" data-todo-header="Launch new template using Vuejs within 20 hours">Task Details Heading</h5>
														<div class="todo-subtext text-muted" 
															data-todosubtext-html="<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. </p>" 
															data-todosubtextText='{"ops":[{"insert":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. \n"}]}'>
															Task Descrption
														</div>
														<span class="todo-time font-12 text-muted"><i class="icon-calender mr-1"></i>20 Oct 2020</span>
													</div>
												</div>
												<div class="ml-auto">
													<div class="dropdown-action">
														<div class="dropdown todo-action-dropdown">
													  		<button class="btn btn-link text-dark p-1 dropdown-toggle text-decoration-none todo-action-dropdown" type="button" id="more-action-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													    		<i class="icon-options-vertical"></i>
													  		</button>
													  		<div class="dropdown-menu dropdown-menu-right" aria-labelledby="more-action-5">
													    		<a class="edit dropdown-item" href="javascript:void(0);"><i class="fas fa-edit text-info mr-1"></i> Edit</a>
													    		<a class="important dropdown-item" href="javascript:void(0);"><i class="fas fa-star text-warning mr-1"></i> Important</a>
													    		<a class="remove dropdown-item" href="javascript:void(0);"><i class="far fa-trash-alt text-danger mr-1"></i>Remove</a>
													    		<a class="dropdown-item permanent-delete" href="javascript:void(0);"><i class="fas fa-trash text-danger mr-1"></i>Permanent Delete</a>
                                                        		<a class="dropdown-item revive" href="javascript:void(0);"><i class="fas fa-undo-alt text-success mr-1"></i>Revive Task</a>
													  		</div>
														</div>
													</div>
												</div>
											</div>
	                    				</div>
	                    			</div>
	                    		</div> <!-- ./Item 5 -->
	                    	</div>
	                    	<!-- Modal -->
		                	<div class="modal fade" id="todoShowListItem" tabindex="-1" role="dialog" aria-hidden="true">
		                        <div class="modal-dialog modal-dialog-centered" role="document">
		                            <div class="modal-content border-0">
		                            	<div class="modal-header bg-light">
									        <h5 class="modal-title task-heading"></h5>
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									          <span aria-hidden="true">&times;</span>
									        </button>
									    </div>
		                                <div class="modal-body">
		                                    <div class="compose-box">
		                                        <div class="compose-content">
		                                        	<label class="mb-0 font-16">Task Details</label>
		                                            <p class="task-text text-muted"></p>
		                                        </div>
		                                    </div>
		                                </div>
		                                <div class="modal-footer">
		                                	<button class="btn btn-danger btn-block" data-dismiss="modal">Close</button>
		                                </div>
		                            </div>
		                        </div>
		                    </div>
	                    </div>
                	</div>
                </div>
                <!-- done lea -->
                <div class="modal fade" id="addTaskModal" tabindex="-1" role="dialog" aria-labelledby="addTaskModalTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
	                        <div class="modal-content border-0">
	                        	<div class="modal-header bg-info text-white">
							        <h5 class="modal-title">Add Task</h5>
							        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							     </div>
	                            <div class="modal-body">
	                                <div class="compose-box">
	                                    <div class="compose-content" id="addTaskModalTitle">
	                                       	<form>
	                                            <div class="row">
	                                                <div class="col-md-12">
	                                                    <div class="d-flex mail-to mb-4">
	                                                        <div class="w-100">
	                                                            <input id="task" type="text" placeholder="Task" class="form-control" name="task" required>
	                                                            <span class="validation-text"></span>
	                                                        </div>
	                                                    </div>
	                                                </div>
	                                            </div>

	                                            <div class="d-flex  mail-subject mb-4">
	                                                <div class="w-100">
	                                                    <div id="taskdescription" class=""></div>
	                                                    <span class="validation-text"></span>
	                                                </div>
	                                            </div>
	                                           </form>
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="modal-footer">
	                                <button class="btn btn-danger" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
	                                <button class="btn btn-info add-tsk" disabled>Add Task</button>
	                                <button class="btn btn-success edit-tsk">Save</button>
	                            </div>
	                        </div>
                    </div>
                </div>
<?php
include("footer.php");
?>