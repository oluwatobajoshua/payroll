$(function () {
  $(".datatable")
    .DataTable({
      processing: true,
      // serverSide: true,
      // ajax: "/employees/index",
      responsive: true,
      lengthChange: true,
      autoWidth: false,
      paging: true,
      lengthMenu: [[10, 25, 500, -1], [10, 25, 500, "All"]],
      buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
    })
    .buttons()
    .container()
    .appendTo("#example1_wrapper .col-md-6:eq(0)");

  $("#example2").DataTable({
    paging: true,
    lengthChange: false,
    searching: false,
    ordering: true,
    info: true,
    autoWidth: false,
    responsive: true,
  });

  if ($("#transactions").attr("id")) {
    console.log($("#transactions").attr("id"));
    var employeeId = $("#employee-id").val();

    var cadre = $.ajax({
      type: "POST",
      dataType: "json",
      url: "/employees/employee",
      data: {
        data: employeeId,
      },
      beforeSend: function (xhr) {
        // Add this line
        xhr.setRequestHeader(
          "X-CSRF-Token",
          $('meta[name="csrfToken"]').attr("content")
        );
        //console.log(xhr);
      },
      success: function (status) {
        //remove the value loading on success
        // console.log(status);
        var union_due = status["cadre"]["union_due"];
        var pension = status["cadre"]["pension"];
        var tax_due = status["cadre"]["tax_due"];

        // $transaction->ctcs  = $employeed->whl_cics + $employeed->bro_cics;
        $("#basic-salary").change(function (e) {
          update();
        });

        function update() {
          // $union_due          = $employeed->salary/12 *($employeed->cadre->union_due * 0.01);
          // $pension            = ($employeed->salary + $employeed->housing_allowance + $employeed->transport_allowance)/12*($employeed->cadre->pension * 0.01);
          // $paye               = $employeed->salary/12 *($employeed->cadre->tax_due * 0.01);
          var basic = parseFloat($("#basic-salary").val());
          var housing = parseFloat($("#housing-allowance").val());
          var transport = parseFloat($("#transport-allowance").val());

          var unionDue = basic * (union_due * 0.01);
          console.log(unionDue);
          $("#union-due").val(unionDue.toFixed(2));

          var pensionDeduction =
            (basic + housing + transport) * (pension * 0.01);
          console.log(pensionDeduction);
          $("#pension-deduction").val(pensionDeduction.toFixed(2));

          var tax_amount = basic * (tax_due * 0.01);
          console.log(tax_amount);
          $("#paye").val(tax_amount.toFixed(2));
        }
      },
      error: function (xhr, textStatus, error) {
        console.log(xhr);
        console.log(textStatus);
        console.log(error);
      },
    });
  }

  $("#state-id").change(function (e) {
    var stateId = $("#state-id option:selected").val();
    e.preventDefault();

    console.log(stateId);
    //make an api call to locals controller and return the related locals
    //serialize form data

    //change the value to loading...
    $("#local-id").html(`<option value="-1">Loading...</option>`);

    $.ajax({
      type: "POST",
      dataType: "json",
      url: "/employees/ajax",
      data: {
        data: stateId,
      },
      beforeSend: function (xhr) {
        // Add this line
        xhr.setRequestHeader(
          "X-CSRF-Token",
          $('meta[name="csrfToken"]').attr("content")
        );
        //console.log(xhr);
      },
      success: function (status) {
        //remove the value loading on success
        $('#local-id option[value="-1"]').remove();
        $.each(status, function (key, value) {
          $("#local-id").append(
            $("<option></option>").val(value.id).html(value.name)
          );
          //set slected value from employee data
          $("#local-id option[value='<?php echo $employee->local_id ?>']").attr(
            "selected",
            "selected"
          );
        });
      },
      error: function (xhr, textStatus, error) {
        console.log(xhr);
        console.log(textStatus);
        console.log(error);
      },
    });
  });
});
