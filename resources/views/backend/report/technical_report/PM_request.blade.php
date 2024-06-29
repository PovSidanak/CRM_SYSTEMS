<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PM Certificate</title>
    <link rel="stylesheet" href="{{ asset('backend/assets/css/createPM.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="./drew/index.html">
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap"
      rel="stylesheet"
    />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <style>
      @media print {
    page {
      background: white;
      box-shadow: none;
    }
    .save-report-pm{
      display: none;
    }
    .exit-report-pm{
      display: none;
    }
    .print-pm{
      display: none;
    }
  }
    :root {
      
    /* ===== Colors ===== */
    --primary-color: #695cfe;}

        .div-btn{
    background: white;
    position: relative;
    right:  355px;
  }
  .save-report-pm{
    background-color: var(--primary-color);
    color: white;
    border: transparent;
    width: 160px;
    border-radius: 4px;
    height: 30px;
    position: relative;
    float: right;
    margin: 10px 10px 10px 10px;
  }
  .exit-report-pm{
    background-color: var(--primary-color);
    color: white;
    border: transparent;
    width: 100px;
    border-radius: 4px;
    height: 30px;
    position: relative;
    float: right;
    margin: 10px 10px 10px 10px;

  }
  .print-pm{
    background-color: var(--primary-color);
    color: white;
    border: transparent;
    width: 100px;
    border-radius: 4px;
    height: 30px;
    position: relative;
    float: right;
    margin: 10px 10px 10px 10px;
  }
  .save-report-pm:hover,
  .exit-report-pm:hover,
  .print-pm:hover{
    background-color: transparent;
    border-radius: 4px;
    border: 1px solid black;
    color: black;
    border: black solid 1px;
  }
  </style>

  <body>
    <page size="A4">
      <!-- <div style="text-align: center">
        <p class="p">PM Certificate</p>
      </div> -->
      <div class="a">
        <div style="float: left">
          <img src="../image/BTI.jpg" alt="" />
        </div>
        <div style="float: right">
          <p class="p1-pm">BTI PAYMENT INT'L (CAM) CO.LTD</p>
        </div>
        <div style="float: right">
          <p class="p2-pm">
            Villa No. 31,St.281, Boeungkork Commune, Toulkork is District,
          </p>
        </div>
        <div style="float: right">
          <p class="p3-pm">Phnom Penh, Kingdom of Cambodia</p>
        </div>
        <div style="float: right">
          <p class="p4-pm">Tel: +855 12 511 233</p>
        </div>

      </div>
      <div>
        <p class="p5-pm">QUARTERLY PREVENTIVE MAINTENANCE CERTIFICATE</p>
      </div>
      <div class="item-all-pm" style="justify-content: center; align-items: center;">
        <div class="item-pm">
            <label for="">Customer name</label>
            <input type="text" class="form-control" required>
        </div>
        <div class="item-pm">
            <label for="">ATM/CRM Model</label>
            <input type="text" class="form-control" required>
        </div>
        <div class="item-pm" >
          <label for="">Report No</label>
          <input type="text" class="form-control" required>
      </div>
      </div>
      <div class="item-all-pm" style="justify-content: center; align-items: center;">
        <div class="item-pm">
            <label for="">Address/Location</label>
            <input type="text" class="form-control" required>
        </div>
        <div class="item-pm">
            <label for="">ATM/CRM SN/ID</label>
            <input type="text" class="form-control" required>
        </div>
        <div class="item-pm" >
          <label for="">Maintenance Date</label>
          <input type="date" class="form-control" required>
      </div>
      </div>
      <hr>
      <div class="contain-text-pm">
        <p class="p6-pm">ATM&CRM Hardware maintenance</p>
        <div class="check-all-pm" style="justify-content: center; align-items: center;">
          <div class="item-pm">
            <input type="checkbox" class="">
            <label for="">System Unit</label>
          </div>
          <div class="item-pm">
            <input type="checkbox" class="">
            <label for="">Monitor</label>
          </div>
          <div class="item-pm">
            <input type="checkbox" class="">
            <label for="">Double Extractor Moudule</label>
          </div>
        </div>
        <div class="check-all-pm" style="justify-content: center; align-items: center;">
          <div class="item-pm">
            <input type="checkbox" class="">
            <label for="">Special Electronic</label>
          </div>
          <div class="item-pm">
            <input type="checkbox" class="">
            <label for="">All Sensors</label>
          </div>
          <div class="item-pm">
            <input type="checkbox" class="">
            <label for="">CMD controller</label>
          </div>
        </div>
        <div class="check-all-pm" style="justify-content: center; align-items: center;">
          <div class="item-pm">
            <input type="checkbox" class="">
            <label for="">Console Electronic</label>
          </div>
          <div class="item-pm">
            <input type="checkbox" class="">
            <label for="">Stacker Trandport</label>
          </div>
          <div class="item-pm">
            <input type="checkbox" class="">
            <label for="">Safe Transport</label>
          </div>
        </div>
        <div class="check-all-pm" style="justify-content: center; align-items: center;">
          <div class="item-pm">
            <input type="checkbox" class="">
            <label for="">Central Power Supply</label>
          </div>
          <div class="item-pm">
            <input type="checkbox" class="">
            <label for="">Presenter Transport</label>
          </div>
          <div class="item-pm">
            <input type="checkbox" class="">
            <label for="">Transport Unit Head Short</label>
          </div>
        </div>
        <div class="check-all-pm" style="justify-content: center; align-items: center;">
          <div class="item-pm">
            <input type="checkbox" class="">
            <label for="">Power Distributor</label>
          </div>
          <div class="item-pm">
          <input type="checkbox" class="">
            <label for="">I/O Module</label>
          </div>
          <div class="item-pm">
          <input type="checkbox" class="">
            <label for="">CMD Distributor</label>
          </div>
        </div>
        <div class="check-all-pm" style="justify-content: center; align-items: center;">
          <div class="item-pm">
            <input type="checkbox" class="">
            <label for="">Anti-Skimming/Anti-Fishing</label>
          </div>
          <div class="item-pm">
            <input type="checkbox" class="">
            <label for="">Picker, Keyboard Picker</label>
          </div>
          <div class="item-pm">
            <input type="checkbox" class="">
            <label for="">FIB/CIB Module</label>
          </div>
        </div>
        <div class="check-all-pm" style="justify-content: center; align-items: center;">
          <div class="item-pm">
            <input type="checkbox" class="">
            <label for="">Card Reader</label>
          </div>
          <div class="item-pm">
            <input type="checkbox" class="">
            <label for="">Single Reject Area</label>
          </div>
          <div class="item-pm">
          <input type="checkbox" class="">
            <label for="">Shutter</label>
          </div>
        </div>
        <div class="check-all-pm" style="justify-content: center; align-items: center;">
          <div class="item-pm">
            <input type="checkbox" class="">
            <label for="">Receipt Printer</label>
          </div>
          <div class="item-pm">
          <input type="checkbox" class="">
            <label for="">FIL Module</label>
          </div>
          <div class="item-pm">
            <input type="checkbox" class="">
            <label for="">Bank Note Reader</label>
          </div>
        </div>
        <div class="check-all-pm" style="justify-content: center; align-items: center;">
          <div class="item-pm">
            <input type="checkbox" class="">
            <label for="">EPP</label>
          </div>
          <div class="item-pm">
          <input type="checkbox" class="">
            <label for="">Soft Key</label>
          </div>
          <div class="item-pm">
            <input type="checkbox" class="">
            <label for="">Distributor Module CRS</label>
          </div>
        </div>
        <div class="check-all-pm" style="justify-content: center; align-items: center;">
          <div class="item-pm">
          <input type="checkbox" class="">
            <label for="">Belt, Presenter, Dispenser Timing Belt</label>
          </div>
          <div class="item-pm">
          <input type="checkbox" class="">
            <label for="">Picker, Take Away Wheel, Stripper Wheel, Paddle</label>
          </div>
          <div class="item-pm">
            <input type="checkbox" class="">
            <label for="">CHT Module & Loopback Transport</label>
          </div>
        </div>
        <div class="check-all-pm" style="justify-content: center; align-items: center;">
          <div class="item-pm">
          <input type="checkbox" class="">
            <label for="">Transport Module Head Lower Path</label>
          </div>
          <div class="item-pm">
          <input type="checkbox" class="">
            <label for="">Escrow & Transport Unit Head Escrow</label>
          </div>
          <div class="item-pm">
            <input type="checkbox" class="">
            <label for="">Portrait Camera/Cash Slot Camera</label>
          </div>
        </div>
      </div>
      <hr>
      <p class="p7-pm">Check all device and print counter before PM</p>

    </page>

    <page size="A4">
      <div style="text-align: center">
        <p class="p">PM Certificate</p>
      </div>
      <div class="a">
        <div style="float: left">
          <img src="../image/BTI.jpg" alt="" />
        </div>
        <div style="float: right">
          <p class="p1-pm">BTI PAYMENT INT'L (CAM) CO.LTD</p>
        </div>
        <div style="float: right">
          <p class="p2-pm">
            Villa No. 31,St.281, Boeungkork Commune, Toulkork is District,
          </p>
        </div>
        <div style="float: right">
          <p class="p3-pm">Phnom Penh, Kingdom of Cambodia</p>
        </div>
        <div style="float: right">
          <p class="p4-pm">Tel: +855 12 511 233</p>
        </div>

      </div>
      <div class="contain-text-pm">
        <div class="check-all-pm" style="justify-content: center; align-items: center;">
          <div class="item-pm">
            <input type="checkbox" class="">
            <label for="">Back up Image(if necessary)</label>
          </div>
          <div class="item-pm">
            <input type="checkbox" class="">
            <label for="">Shutdown machine</label>
          </div>
          <div class="item-pm">
            <input type="checkbox" class="">
            <label for="">Check Environment</label>
          </div>
        </div>
        <div class="check-all-pm" style="justify-content: center; align-items: center;">
          <div class="item-pm">
            <input type="checkbox" class="">
            <label for="">Label all data and power cables before disconnect and reconnect</label>
          </div>
        </div>
      </div>
      <hr>
      <p class="p7-pm">Power On ATM/CRM Machine</p>
      <div class="contain-text-pm">
        <div class="check-all-pm" style="justify-content: center; align-items: center;">
          <div class="item-pm">
            <input type="checkbox" class="">
            <label for="">Power On ATM/CRM Machine</label>
          </div>
        </div>
      </div>
      <hr>
      <p class="p7-pm">Software Check/Devices Self-Test/Operation</p>
      <div class="contain-text-pm">
        <div class="check-all-pm" style="justify-content: center; align-items: center;">
          <div class="item-pm">
            <input type="checkbox" class="">
            <label for="">Journal Record(Daily Record)</label>
          </div>
          <div class="item-pm">
            <input type="checkbox" class="">
            <label for="">Bank officer perform load cash</label>
          </div>
          <div class="item-pm">
            <input type="checkbox" class="">
            <label for="">Check On Camera Capture</label>
          </div>
        </div>
        <div class="check-all-pm" style="justify-content: center; align-items: center;">
          <div class="item-pm">
          <input type="checkbox" class="">
            <label for="">Confirm ATM in service </label>
          </div>
          <div class="item-pm">
            <input type="checkbox" class="">
            <label for="">Perform Transaction</label>
          </div>
          <div class="item-pm">
            <input type="checkbox" class="">
            <label for="">Check all device status in TSOP</label>
          </div>
        </div>
        <div class="check-all-pm" style="justify-content: center; align-items: center;">
          <div class="item-pm">
            <input type="checkbox" class="">
            <label for="">Check all devices status in SOP</label>
          </div>
          <div class="item-pm">
          <input type="checkbox" class="">
            <label for="">Test Cash during perform cash loading</label>
          </div>
          <div class="item-pm">
          <input type="checkbox" class="">
            <label for="">Test head of card reader (Magnetic stripe, Perform transaction chip card reader)</label>
          </div>
        </div>
      </div>
<hr>
      <div class="item-all-pm-3">
        <div class="item-pm-3">
          <label>Recommendation (If/Any)</label>
          <textarea class="form-control form-control-3 " rows="4" required></textarea >
        </div>
      </div>
        <hr>
        <div class="item-all-pm" style="justify-content: center; align-items: center;">
          <div class="item-pm">
              <label for="">Customer name</label>
              <input type="text" class="form-control"  required>
          </div>
          <div class="item-pm">
              <label for="">Technician Name</label>
              <input type="text" class="form-control" required>
          </div>
          <div class="item-pm" >
            <label for="">Start Time</label>
            <input type="time" class="form-control" required>
        </div>
        </div>

        <div class="item-all-pm-under" style="justify-content: center; align-items: center;">
          <div class="item-pm-2">
              <label for="">Date</label>
              <input type="date" class="form-control form-control-2" required>
          </div>
          <div class="item-pm-2">
              <label for="">Time Completed</label>
              <input type="time" class="form-control form-control-2" required>
          </div>
        </div>
        <hr>
      <div class="item-11pm">
        <div class="item-div-11pm">
          <label for="">Customer Signature</label>
          <a href="{{route('all.drewcustomerPM')}}">
          <button class="form-control form-control-btn" id="customer_signature">SIGN HERE</button>
          </a>
        </div>
        <div class="item-div-11pm">
          <label for="">Technician Signature</label>
          <a href="{{route('all.drewTechnicalPM')}}">
          <button class="form-control form-control-btn" id="technician-signature">SIGN HERE</button>
          </a>
        </div>
      </div>
      <hr>
    </page>
    <div class="div-btn">
    <div>
      <button class="print-pm" id="printBtnPm">PRINT</button>
    </div>
    <!-- <div>
      <button class="save-report-pm"  id="saveAsPdfBtnPm">SAVE AS PDF</button>
    </div> -->
    <div>
      <a href="techniclereports">
      <button class="exit-report-pm">EXIT</button>
      </a>
    </div>
    </div>

    <!-- <div><button>SAVE</button></div> -->
<script src="scrip.js"></script>
<script>
    document.getElementById('saveAsPdfBtnPm').addEventListener('click', function() {
        var element = document.getElementById('contentToSaveAsPdf'); // Replace 'contentToSaveAsPdf' with the ID of the element you want to save
        html2pdf(element, {
            margin: 1,
            filename: 'document.pdf',
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { dpi: 192, letterRendering: true },
            jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
        });
    });
    document.getElementById('printBtnPm').addEventListener('click', function() {
    window.print();
});

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>

    <!-- <page size="A4"></page>
    <page size="A4" layout="landscape"></page>
    <page size="A5"></page>
    <page size="A5" layout="landscape"></page>
    <page size="A3"></page>
    <page size="A3" layout="landscape"></page> -->
  </body>
</html>
