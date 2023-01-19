<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bidding $bidding
 */
?>
<?php
$this->assign('title', __('Add Bidding'));
$this->Breadcrumbs->add([
  ['title' => 'Home', 'url' => '/'],
  ['title' => 'List Biddings', 'url' => ['action' => 'index']],
  ['title' => 'Add'],
]);
?>

<div class="card card-primary card-outline">
  <?= $this->Form->create($bidding);
  $i ?>
  <div class="card-body">
    <?php for ($i = 0; $i < 2; $i++) : ?>
      <div class="row">
        <div class="col-1">
          <?= $this->Form->control('bidding_details.' . $i . '.code', ['label' => $i + 1 . '. Code', 'onChange' => 'orderDetailsTotal(' . $i . ');']); ?>
        </div>
        <div class="col-4">
          <?= $this->Form->control('bidding_details.' . $i . '.asset_id', ['options' => $assets]); ?>
          <?= $this->Form->control('bidding_details.' . $i . '.status_id', ['type' => 'hidden', 'value'=>1]); ?>
        </div>
        <div class="col-2">
          <?= $this->Form->control('bidding_details.' . $i . '.reserved_price', ['class' => 'form-control', 'readonly' => true]); ?>
        </div>
        <div class="col-1">
          <?= $this->Form->control('bidding_details.' . $i . '.qty', ['onChange' => 'totalPayabe(' . $i . ');']); ?>
        </div>
        <div class="col-2">
          <?= $this->Form->control('bidding_details.' . $i . '.price', ['label' => 'Unit Price','onChange' => 'totalPayabe(' . $i . ');']); ?>
        </div>
        <div class="col-2">
          <?= $this->Form->control('bidding_details.' . $i . '.total_payable', ['class' => 'form-control totalPayable', 'readonly' => true]); ?>
        </div>
      </div>
    <?php endfor; ?>
    <div class="row">
      <div class="col-8">
      </div>
      <div class="col-2">
        <?= $this->Form->control('asset_qty', ['label' => 'Asset Count', 'readonly' => true, 'value' => $i]); ?>
      </div>
      <div class="col-2">
        <?= $this->Form->control('amount', ['label' => 'Grand Total', 'readonly' => true]); ?>
      </div>
    </div>
  </div>

  <div class="card-footer d-flex">
    <div class="ml-auto">
      <?= $this->Form->button(__('Save')) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>

  <?= $this->Form->end() ?>
</div>

<script>

  function totalPayabe(i) {
    var grandTotal = 0.00;
    var unitPrice = $('#bidding-details-' + i + '-price').val();
    var qty = parseInt($('#bidding-details-' + i + '-qty').val())
    var totalPayabe = unitPrice * qty;
    $('#bidding-details-' + i + '-total-payable').val(totalPayabe.toFixed(2))

    $('.totalPayable').each(function() {
      var checkval = parseFloat(this.value);
      if (!isNaN(checkval)) grandTotal += checkval;
    });

    $('#amount').val(grandTotal.toFixed(2));

  }

  function orderDetailsTotal(i) {
    ajax(i);
  }

  function ajax(i) {
    var formUrl = "<?php echo $this->Url->build(['controller' => 'Assets', 'action' => 'ajax']); ?>";
    var asset_id = $('#bidding-details-' + i + '-code').val();
    console.log(asset_id);
    //change the value to loading...
    $('#bidding-details-' + i + '-asset-id').html(`<option value="-1">Loading...</option>`);

    if (asset_id) {
      console.log('cool')
    } else {
      alert('Please enter an asset id');
      $('#bidding-details-' + i + '-code').focus();
    }

    $.ajax({
      type: 'POST',
      dataType: 'json',
      url: formUrl,
      data: {
        data: asset_id
      },
      beforeSend: function(xhr) { // Add this line
        xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
        //console.log(xhr);
      },
      success: function(status) {
        console.log(status);
        //remove the value loading on success                
        $('#bidding-details-' + i + '-asset-id option[value="-1"]').remove();
        $.each(status, function(key, value) {
          // console.log(value.location.name);
          // console.log("#bidding-details-' + i + '-asset-id");
          $('#bidding-details-' + i + '-asset-id').append($('<option></option>').val(value.id).html(value.code + ' - ' + value.item + ' - ' + value.model + ' - ' + value.qty_available + ' - ' + value.qty_bidded + ' - ' + value.qty_left + ' - ' + value.location.name + ' - ₦ ' + value.reserved_price + ' -Date: ' + value.date_of_purchase));
          $('#bidding-details-' + i + '-reserved-price').val(value.reserved_price);
          if (value.qty_left > 0) {
            var grandTotal = 0.00
            var qty_left = value.qty_left;
            // console.log('Qty-left');
            // console.log(value.qty_left);            
            var unitPrice = $('#bidding-details-' + i + '-price').val();
            var qty = parseInt($('#bidding-details-' + i + '-qty').val())
            // console.log('Requested'); 
            // console.log(qty);
            if (isNaN(qty)) {
              $('#bidding-details-' + i + '-qty').val(1);
              qty = 1;
            }
            //  console.log(qty);

            if (qty <= qty_left) {
              if (qty > 0) {
                var total_payable = qty * unitPrice;
                // console.log(total_payable);
                $('#bidding-details-' + i + '-total-payable').val(total_payable.toFixed(2))
                $('.totalPayable').each(function() {
                  var checkval = parseFloat(this.value);
                  if (!isNaN(checkval)) grandTotal += checkval;
                });

                $('#amount').val(grandTotal.toFixed(2));
              } else {
                alert('You can\'t bid for less than 1');
              }

            } else {
              $('#bidding-details-' + i + '-qty').val(parseFloat());
              alert('You can\'t bid for more than ' + qty_left + ' items!');
            }
          } else {

            $('#bidding-details-' + i + '-asset-id').html(`<option value="-1">Quantity left is 0, please enter another asset code</option>`);
          }
        });
      },
      error: function(xhr, textStatus, error) {
        console.log(xhr);
        console.log(textStatus);
        console.log(error);
      }
    });
  }
</script>