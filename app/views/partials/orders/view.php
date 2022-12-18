<?php
$comp_model = new SharedController;
$page_element_id = "view-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
//Page Data Information from Controller
$data = $this->view_data;
//$rec_id = $data['__tableprimarykey'];
$page_id = $this->route->page_id; //Page id from url
$view_title = $this->view_title;
$show_header = $this->show_header;
$show_edit_btn = $this->show_edit_btn;
$show_delete_btn = $this->show_delete_btn;
$show_export_btn = $this->show_export_btn;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="view"  data-display-type="table" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">View  Orders</h4>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
    <div  class="">
        <div class="container">
            <div class="row ">
                <div class="col-md-12 comp-grid">
                    <?php $this :: display_page_errors(); ?>
                    <div  class="card animated fadeIn page-content">
                        <?php
                        $counter = 0;
                        if(!empty($data)){
                        $rec_id = (!empty($data['id']) ? urlencode($data['id']) : null);
                        $counter++;
                        ?>
                        <div id="page-report-body" class="">
                            <table class="table table-hover table-borderless table-striped">
                                <!-- Table Body Start -->
                                <tbody class="page-data" id="page-data-<?php echo $page_element_id; ?>">
                                    <tr  class="td-id">
                                        <th class="title"> Id: </th>
                                        <td class="value"> <?php echo $data['id']; ?></td>
                                    </tr>
                                    <tr  class="td-user_id">
                                        <th class="title"> User Id: </th>
                                        <td class="value">
                                            <span  data-value="<?php echo $data['user_id']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("orders/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="user_id" 
                                                data-title="Enter User Id" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['user_id']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-carrier_id">
                                        <th class="title"> Carrier Id: </th>
                                        <td class="value">
                                            <span  data-value="<?php echo $data['carrier_id']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("orders/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="carrier_id" 
                                                data-title="Enter Carrier Id" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['carrier_id']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-invoice_id">
                                        <th class="title"> Invoice Id: </th>
                                        <td class="value">
                                            <span  data-value="<?php echo $data['invoice_id']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("orders/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="invoice_id" 
                                                data-title="Enter Invoice Id" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['invoice_id']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-invoice_date">
                                        <th class="title"> Invoice Date: </th>
                                        <td class="value">
                                            <span  data-flatpickr="{ minDate: '', maxDate: ''}" 
                                                data-value="<?php echo $data['invoice_date']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("orders/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="invoice_date" 
                                                data-title="Enter Invoice Date" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="flatdatetimepicker" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['invoice_date']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-delivery_date">
                                        <th class="title"> Delivery Date: </th>
                                        <td class="value">
                                            <span  data-flatpickr="{ minDate: '', maxDate: ''}" 
                                                data-value="<?php echo $data['delivery_date']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("orders/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="delivery_date" 
                                                data-title="Enter Delivery Date" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="flatdatetimepicker" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['delivery_date']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-total_discount">
                                        <th class="title"> Total Discount: </th>
                                        <td class="value">
                                            <span  data-step="0.1" 
                                                data-value="<?php echo $data['total_discount']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("orders/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="total_discount" 
                                                data-title="Enter Total Discount" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['total_discount']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-tax">
                                        <th class="title"> Tax: </th>
                                        <td class="value">
                                            <span  data-step="0.1" 
                                                data-value="<?php echo $data['tax']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("orders/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="tax" 
                                                data-title="Enter Tax" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['tax']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-shipping">
                                        <th class="title"> Shipping: </th>
                                        <td class="value">
                                            <span  data-step="0.1" 
                                                data-value="<?php echo $data['shipping']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("orders/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="shipping" 
                                                data-title="Enter Shipping" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['shipping']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-shipping_tax">
                                        <th class="title"> Shipping Tax: </th>
                                        <td class="value">
                                            <span  data-step="0.1" 
                                                data-value="<?php echo $data['shipping_tax']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("orders/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="shipping_tax" 
                                                data-title="Enter Shipping Tax" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['shipping_tax']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-subtotal">
                                        <th class="title"> Subtotal: </th>
                                        <td class="value">
                                            <span  data-step="0.1" 
                                                data-value="<?php echo $data['subtotal']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("orders/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="subtotal" 
                                                data-title="Enter Subtotal" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['subtotal']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-total">
                                        <th class="title"> Total: </th>
                                        <td class="value">
                                            <span  data-step="0.1" 
                                                data-value="<?php echo $data['total']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("orders/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="total" 
                                                data-title="Enter Total" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['total']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-creator">
                                        <th class="title"> Creator: </th>
                                        <td class="value">
                                            <span  data-value="<?php echo $data['creator']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("orders/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="creator" 
                                                data-title="Enter Creator" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['creator']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-slug">
                                        <th class="title"> Slug: </th>
                                        <td class="value">
                                            <span  data-value="<?php echo $data['slug']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("orders/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="slug" 
                                                data-title="Enter Slug" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['slug']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-status">
                                        <th class="title"> Status: </th>
                                        <td class="value">
                                            <span  data-value="<?php echo $data['status']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("orders/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="status" 
                                                data-title="Enter Status" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['status']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-created_at">
                                        <th class="title"> Created At: </th>
                                        <td class="value">
                                            <span  data-value="<?php echo $data['created_at']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("orders/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="created_at" 
                                                data-title="Enter Created At" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['created_at']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-updated_at">
                                        <th class="title"> Updated At: </th>
                                        <td class="value">
                                            <span  data-flatpickr="{ minDate: '', maxDate: ''}" 
                                                data-value="<?php echo $data['updated_at']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("orders/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="updated_at" 
                                                data-title="Enter Updated At" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="flatdatetimepicker" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['updated_at']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                                <!-- Table Body End -->
                            </table>
                        </div>
                        <div class="p-3 d-flex">
                            <div class="dropup export-btn-holder mx-1">
                                <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-save"></i> Export
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <?php $export_print_link = $this->set_current_page_link(array('format' => 'print')); ?>
                                    <a class="dropdown-item export-link-btn" data-format="print" href="<?php print_link($export_print_link); ?>" target="_blank">
                                        <img src="<?php print_link('assets/images/print.png') ?>" class="mr-2" /> PRINT
                                        </a>
                                        <?php $export_pdf_link = $this->set_current_page_link(array('format' => 'pdf')); ?>
                                        <a class="dropdown-item export-link-btn" data-format="pdf" href="<?php print_link($export_pdf_link); ?>" target="_blank">
                                            <img src="<?php print_link('assets/images/pdf.png') ?>" class="mr-2" /> PDF
                                            </a>
                                            <?php $export_word_link = $this->set_current_page_link(array('format' => 'word')); ?>
                                            <a class="dropdown-item export-link-btn" data-format="word" href="<?php print_link($export_word_link); ?>" target="_blank">
                                                <img src="<?php print_link('assets/images/doc.png') ?>" class="mr-2" /> WORD
                                                </a>
                                                <?php $export_csv_link = $this->set_current_page_link(array('format' => 'csv')); ?>
                                                <a class="dropdown-item export-link-btn" data-format="csv" href="<?php print_link($export_csv_link); ?>" target="_blank">
                                                    <img src="<?php print_link('assets/images/csv.png') ?>" class="mr-2" /> CSV
                                                    </a>
                                                    <?php $export_excel_link = $this->set_current_page_link(array('format' => 'excel')); ?>
                                                    <a class="dropdown-item export-link-btn" data-format="excel" href="<?php print_link($export_excel_link); ?>" target="_blank">
                                                        <img src="<?php print_link('assets/images/xsl.png') ?>" class="mr-2" /> EXCEL
                                                        </a>
                                                    </div>
                                                </div>
                                                <a class="btn btn-sm btn-info"  href="<?php print_link("orders/edit/$rec_id"); ?>">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                <a class="btn btn-sm btn-danger record-delete-btn mx-1"  href="<?php print_link("orders/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
                                                    <i class="fa fa-times"></i> Delete
                                                </a>
                                            </div>
                                            <?php
                                            }
                                            else{
                                            ?>
                                            <!-- Empty Record Message -->
                                            <div class="text-muted p-3">
                                                <i class="fa fa-ban"></i> No Record Found
                                            </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>