<?php $this->load->view('includes/header'); ?>

<div class="block-header">
	<h2>Register Merchant</h2>
</div>
<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="body">
				<form action="" method="post" novalidate>
				
<!--



additional_information varchar(500) 
date_of_reg timestamp 
date_updated timestamp 
merchant_status enum('0','1','2') 
user_id int(11) 
date_validated timestamp 
validated_user int(9) -->
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label for=""></label>
                                <div class="form-line ">
                                    <input class="form-control" type="text" name="" id="" required>
                                </div>
                                <label class="error"><?php echo form_error(''); ?></label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for=""></label>
                                <div class="form-line ">
                                    <input class="form-control" type="text" name="" id="" required>
                                </div>
                                <label class="error"><?php echo form_error(''); ?></label>
                            </div>
                        </div>
                    </div>
                    <fieldset>
						<legend>SECTION 1: General Information</legend>

						<div class="row">
							<div class="col-sm-8">
								<div class="form-group">
									<label for="company_name">Company Name</label>
									<div class="form-line ">
										<input class="form-control" type="text" name="company_name" id="company_name" 
										required value="<?php echo set_value('company_name'); ?>">
									</div>
									<label class="error"><?php echo form_error('company_name'); ?></label>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label for="rc_no">RC Number</label>
									<div class="form-line ">
										<input class="form-control" type="text" name="rc_no" id="rc_no" 
										required value="<?php echo set_value('rc_no'); ?>" >
										
									</div>
									<label class="error"><?php echo form_error('rc_no'); ?></label>

								</div>
							</div>
						</div>
						<div class="row">
						
							<div class="col-sm-4">
								<div class="form-group">
									<label for="type_of_ownership">Ownership Type</label>
									<div class="form-line ">
										<input class="form-control" type="text" name="type_of_ownership" id="type_of_ownership" 
										required value="<?php echo set_value('type_of_ownership'); ?>" list="type_of_ownership_data">
										<datalist id="type_of_ownership_data">  
											<option>Sole Owner</option>
											<option>Partnership/Joint</option>
											<option>Venture Limited</option>
											<option>Liability Company</option>
											<option>Non-Profit Organization/NGO</option>
											<option>Public Liability</option>
											<option>Company Religious Organization</option>
											<option>Government</option>
										</datalist>
									</div>
									<label class="error"><?php echo form_error('type_of_ownership'); ?></label>
								</div>
							</div>
							<div class="col-sm-4">
                                <div class="form-group">
                                    <label for="date_reg">Date Registered</label>
                                    <div class="form-line ">
                                        <input class="form-control" type="text" name="date_reg" id="date_reg"
                                        required value="<?php echo set_value('date_reg'); ?>">
                                    </div>
                                    <label class="error"><?php echo form_error('date_reg'); ?></label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="staff_strength">Staff Strength</label>
                                    <div class="form-line ">
                                        <input class="form-control" type="text" name="staff_strength" id="staff_strength" required>
                                    </div>
                                    <label class="error"><?php echo form_error('staff_strength'); ?></label>
                                </div>
                            </div>
						</div>

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="office_phone">Office Telephone</label>
                                    <div class="form-line ">
                                        <input class="form-control" type="text" name="office_phone" id="office_phone" required>
                                    </div>
                                    <label class="error"><?php echo form_error('office_phone'); ?></label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="cus_serv_phone">Customer service Telephone</label>
                                    <div class="form-line ">
                                        <input class="form-control" type="text" name="cus_serv_phone" id="cus_serv_phone" required>
                                    </div>
                                    <label class="error"><?php echo form_error('cus_serv_phone'); ?></label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                            <div class="form-group">
                                <label for="office_email">Office Email</label>
                                <div class="form-line ">
                                    <input class="form-control" type="text" name="office_email" id="office_email" required>
                                </div>
                                <label class="error"><?php echo form_error('office_email'); ?></label>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Postal Address</label>
                                    <div class="form-line ">
                                        <textarea class="form-control" type="text" name="postal_address" id="postal_address" required></textarea>
                                    </div>
                                    <label class="error"><?php echo form_error('postal_address'); ?></label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="office_address">Office Address</label>
                                    <div class="form-line ">
                                        <textarea class="form-control" type="text" name="office_address" id="office_address" required></textarea>
                                    </div>
                                    <label class="error"><?php echo form_error('office_address'); ?></label>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>SECTION 2: CONTACT INFORMATION</legend>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="name_of_p_cont_pers">Name of Primary Contact Person</label>
                                    <div class="form-line ">
                                        <input class="form-control" type="text" name="name_of_p_cont_pers" id="name_of_p_cont_pers" required>
                                    </div>
                                    <label class="error"><?php echo form_error('name_of_p_cont_pers'); ?></label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="email_of_p_cont_pers">Email of Primary Contact Person</label>
                                    <div class="form-line ">
                                        <input class="form-control" type="text" name="email_of_p_cont_pers" id="email_of_p_cont_pers" required>
                                    </div>
                                    <label class="error"><?php echo form_error('email_of_p_cont_pers'); ?></label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="">Contact Person's Designation</label>
                                    <div class="form-line ">
                                        <input class="form-control" type="text" name="des_of_p_cont_pers" id="des_of_p_cont_pers" required>
                                    </div>
                                    <label class="error"><?php echo form_error('des_of_p_cont_pers'); ?></label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="phone_of_p_cont_pers">Contact Person's Telephone</label>
                                    <div class="form-line ">
                                        <input class="form-control" type="text" name="phone_of_p_cont_pers" id="phone_of_p_cont_pers" required>
                                    </div>
                                    <label class="error"><?php echo form_error('phone_of_p_cont_pers'); ?></label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="name_of_s_cont_pers">Name of Secondary Contact Person</label>
                                    <div class="form-line ">
                                        <input class="form-control" type="text" name="name_of_s_cont_pers" id="name_of_s_cont_pers" required>
                                    </div>
                                    <label class="error"><?php echo form_error('name_of_s_cont_pers'); ?></label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="email_of_s_cont_pers">Email of Secondary Contact Person</label>
                                    <div class="form-line ">
                                        <input class="form-control" type="text" name="email_of_s_cont_pers" id="email_of_s_cont_pers" required>
                                    </div>
                                    <label class="error"><?php echo form_error('email_of_s_cont_pers'); ?></label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="des_of_s_cont_pers">Secondary Contact Person's Designation</label>
                                    <div class="form-line ">
                                        <input class="form-control" type="text" name="des_of_s_cont_pers" id="des_of_s_cont_pers" required>
                                    </div>
                                    <label class="error"><?php echo form_error('des_of_s_cont_pers'); ?></label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="phone_of_s_cont_pers">Secondary Contact Person's Telephone</label>
                                    <div class="form-line ">
                                        <input class="form-control" type="text" name="phone_of_s_cont_pers" id="phone_of_s_cont_pers" required>
                                    </div>
                                    <label class="error"><?php echo form_error('phone_of_s_cont_pers'); ?></label>
                                </div>
                            </div>
                        </div>
					</fieldset>

					<fieldset>
						<legend>SECTION 3: E-COMMERCE WEBSITE INFORMATION</legend>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="website_name">Website Name</label>
                                    <div class="form-line ">
                                        <input class="form-control" type="text" name="website_name" id="website_name" required>
                                    </div>
                                    <label class="error"><?php echo form_error('website_name'); ?></label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="website_url">Website Url</label>
                                    <div class="form-line">
                                        <input class="form-control" type="text" name="website_url" id="website_url" required>
                                    </div>
                                    <label class="error"><?php echo form_error('website_url'); ?></label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="desc_prod">Product Description</label>
                                    <div class="form-line ">
                                        <textarea class="form-control" name="desc_prod" id="desc_prod" required></textarea>
                                    </div>
                                    <label class="error"><?php echo form_error('desc_prod'); ?></label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line ">
                                        <b >Is Customer pre-registration? </b><br>
                                        <input type="radio" id="cust_pre_reg_no" name="cust_pre_reg" value="No" require  />
                                        <label for="user_type_user">No</label>
                                        <input type="radio" id="cust_pre_reg_yes" name="cust_pre_reg" value="Yes" require />
                                        <label for="cust_pre_reg_yes">Yes</label>
                                    </div>
                                    <label class="error"><?php echo form_error('cust_pre_reg'); ?></label>
                                </div>
                                <div class="form-group">
                                    <label for="if_cust_pre_reg">(If yes, what basic information is provided to you?)</label>
                                    <div class="form-line ">

                                        <input type="checkbox" id="if_cust_pre_reg_1" name="if_cust_pre_reg[]" value="Name">
                                        <label for="if_cust_pre_reg_1">Name</label>

                                        <input type="checkbox" id="if_cust_pre_reg_2" name="if_cust_pre_reg[]" value="Address">
                                        <label for="if_cust_pre_reg_2">Address</label>

                                        <input type="checkbox" id="if_cust_pre_reg_3" name="if_cust_pre_reg[]" value="DOB">
                                        <label for="if_cust_pre_reg_3">DOB</label>

                                        <input type="checkbox" id="if_cust_pre_reg_4" name="if_cust_pre_reg[]" value="Picture">
                                        <label for="if_cust_pre_reg_4">Picture</label>

                                        <input type="checkbox" id="if_cust_pre_reg_5" name="if_cust_pre_reg[]" value="Phone No.">
                                        <label for="if_cust_pre_reg_5">Phone No.</label>

                                        <input type="checkbox" id="if_cust_pre_reg_6" name="if_cust_pre_reg[]" value="Email address">
                                        <label for="if_cust_pre_reg_6">Email address</label>

                                        <input type="checkbox" id="if_cust_pre_reg_7" name="if_cust_pre_reg[]" value="Security Question">
                                        <label for="if_cust_pre_reg_7">Security Question</label>, or

                                        <label for="if_cust_pre_reg_custom">Other (Specify)</label>
                                        <input type="text" id="if_cust_pre_reg_custom" name="if_cust_pre_reg[]" value="">

                                    </div>
                                    <label class="error"><?php echo form_error('if_cust_pre_reg'); ?></label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="trans_vol_per_day">Transaction Vol./Day</label>
                                    <div class="form-line ">
                                        <input class="form-control" type="text" name="trans_vol_per_day" id="trans_vol_per_day">
                                    </div>
                                    <label class="error"><?php echo form_error('trans_vol_per_day'); ?></label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="no_of_days_for_delev">No of days until products/services is delivered:</label>
                                    <div class="form-line">
                                        <input class="form-control" type="text" name="no_of_days_for_delev" id="no_of_days_for_delev">
                                    </div>
                                    <label class="error"><?php echo form_error('no_of_days_for_delev'); ?></label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="method_of_deliv">Website Url</label>
                                    <div class="form-line">
                                        <input class="form-control" type="text" name="method_of_deliv" id="method_of_deliv" >
                                    </div>
                                    <label class="error"><?php echo form_error('method_of_deliv'); ?></label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">

                                <label for="if_cust_pre_reg">Method of Goods/Service Delivery</label>
                                <div class="form-line ">
                                    <input type="checkbox" id="method_of_deliv_1" name="method_of_deliv[]" value="Courier">
                                    <label for="method_of_deliv_1">Courier</label>

                                    <input type="checkbox" id="method_of_deliv_2" name="method_of_deliv[]" value="Online download">
                                    <label for="method_of_deliv_2">Online download</label>

                                    <input type="checkbox" id="method_of_deliv_3" name="method_of_deliv[]" value="Direct Credit to Account">
                                    <label for="method_of_deliv_3">Direct Credit to Account</label>, or

                                    <label for="method_of_deliv_custom">Other (Give Details)</label>
                                    <input type="text" id="method_of_deliv_custom" name="method_of_deliv[]" value="">

                                </div>
                                <label class="error"><?php echo form_error('method_of_deliv'); ?></label>

                            </div>

                        </div>



					</fieldset>

					<fieldset>
						<legend>SECTION 4: ACQUIRING BANK</legend>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="first_name">Bank</label>
                                    <div class="form-line ">
                                        <select class="form-control  show-tick" name="merchant_bank" id="merchant_bank" required>
                                            <option></option>
                                            <?php foreach ($banks as $bank): ?>
                                            <option value="<?php print $bank->bank_id ?>"><?php print $bank->bank_name ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <label class="error"><?php echo form_error('merchant_bank'); ?></label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="account_name">Account Name</label>
                                    <div class="form-line ">
                                        <input class="form-control" type="text" name="account_name" id="account_name" required>
                                    </div>
                                    <label class="error"><?php echo form_error('account_name'); ?></label
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="account_no">Account Number</label>
                                    <div class="form-line ">
                                        <input class="form-control" type="text" name="account_no" id="account_no" required>
                                    </div>
                                    <label class="error"><?php echo form_error('account_no'); ?></label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <b for="account_type">Account Type</b>
                                    <div class="form-line ">
                                        <input type="radio" name="account_type" id="account_type_current" required value="Current Account">
                                        <label for="account_type_current">Current Account</label>
                                        <input type="radio" name="account_type" id="account_type_saving" required value="Savings Account">
                                        <label for="account_type_saving">Savings Account</label>
                                    </div>
                                    <label class="error"><?php echo form_error('account_type'); ?></label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="bank_branch">Bank Branch</label>
                                    <div class="form-line ">
                                        <input class="form-control" type="text" name="bank_branch" id="bank_branch" required>
                                    </div>
                                    <label class="error"><?php echo form_error('bank_branch'); ?></label>
                                </div>
                            </div>
                        </div>

					</fieldset>

					<fieldset>
						<legend>SECTION 5 OTHER INFORMATION</legend>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="additional_information">Additional Information</label>
                                    <div class="form-line ">
                                        <textarea class="form-control" type="text" name="additional_information" id="additional_information"></textarea>
                                    </div>
                                    <label class="error"><?php echo form_error('additional_information'); ?></label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group demo-tagsinput-area">
                                    <label for="additional_information">Documents Received (Enter Multiple)</label>
                                    <div class="form-line">
                                        <input type="text" class="form-control" data-role="tagsinput" name="documents" value="">
                                    </div>
                                </div>
                                <label class="error"><?php echo form_error('additional_information'); ?></label>
                            </div>
                        </div>
                    </fieldset>
					
				
					<button class="btn btn-success">Save</button>
				</form>
			</div>
		</div>
		
	</div>

</div>
<?php $this->load->view('includes/footer'); ?>
