<div class="container">
    <h3>Add Record</h3>
    <?php if($this->session->flashdata('flashSuccess')):?>
        <div class='alert alert-success alert-dismissable'>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <?=$this->session->flashdata('flashSuccess')?>
        </div>
    <?php endif?>

    <?php if($this->session->flashdata('flashError')):?>
        <div class='alert alert-danger alert-dismissable'>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <?=$this->session->flashdata('flashError')?>
        </div>
    <?php endif?>
    <?php
    //var_dump($result);
    $action = "record/create_action";
    $attributes = array('name' => 'form_record', 'id' => 'form_record', 'method' => 'post');
    echo form_open($action,$attributes);
    /*if(isset($result)) {
        echo "<input type='hidden' name='branchId' id='branchId' value='".$result->id."'/>";
    }*/
    ?>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="txtDetailsName">Details</label>
                <input type="text" name="txtDetailsName" id="txtDetailsName" class="form-control form-control-sm" placeholder="Enter Details" required>
            </div>
            <div class="form-group col-md-12">
                <label for="txtReferenceName">Reference</label>
                <input type="text" name="txtReferenceName" id="txtReferenceName" class="form-control form-control-sm" placeholder="Enter Reference" required>
            </div>
            <div class="form-group col-md-12">
                <label for="txtAmountName">Amount</label>
                <input type="text" name="txtAmountName" id="txtAmountName" class="form-control form-control-sm" placeholder="Enter Amount" required>
            </div>
            <div class="form-group col-md-12">
                <label for="selTransaction">Type of Transaction</label>
                <select class="form-control form-control-sm" name="selTransaction" id="selTransaction" required>
                    <option value="">Select</option>
                    <option value='1'>Credit</option>
                    <option value='2'>Debit</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    <?php echo form_close(); ?>
</div>