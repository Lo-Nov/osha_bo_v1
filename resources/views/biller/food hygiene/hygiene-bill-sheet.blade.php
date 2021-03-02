<html>
<head><meta http-equiv=Content-Type content="text/html; charset=UTF-8">
    <style type="text/css">
        <!--
        span.cls_002{font-family:Times,serif;font-size:22.1px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
        div.cls_002{font-family:Times,serif;font-size:22.1px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
        span.cls_003{font-family:Times,serif;font-size:8.1px;color:rgb(0,0,0);font-weight:normal;font-style:italic;text-decoration: none}
        div.cls_003{font-family:Times,serif;font-size:8.1px;color:rgb(0,0,0);font-weight:normal;font-style:italic;text-decoration: none}
        span.cls_004{font-family:Times,serif;font-size:9.1px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
        div.cls_004{font-family:Times,serif;font-size:9.1px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
        span.cls_005{font-family:Times,serif;font-size:14.1px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
        div.cls_005{font-family:Times,serif;font-size:14.1px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
        span.cls_006{font-family:Times,serif;font-size:12.1px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
        div.cls_006{font-family:Times,serif;font-size:12.1px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
        span.cls_007{font-family:Times,serif;font-size:13.1px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
        div.cls_007{font-family:Times,serif;font-size:13.1px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
        span.cls_008{font-family:Times,serif;font-size:10.1px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
        div.cls_008{font-family:Times,serif;font-size:10.1px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
        span.cls_009{font-family:Times,serif;font-size:11.1px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
        div.cls_009{font-family:Times,serif;font-size:11.1px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
        span.cls_010{font-family:Times,serif;font-size:10.1px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
        div.cls_010{font-family:Times,serif;font-size:10.1px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
        span.cls_011{font-family:Times,serif;font-size:10.1px;color:rgb(0,0,0);font-weight:normal;font-style:italic;text-decoration: none}
        div.cls_011{font-family:Times,serif;font-size:10.1px;color:rgb(0,0,0);font-weight:normal;font-style:italic;text-decoration: none}
        -->
    </style>
    <script type="text/javascript" src="a4c840de-5e10-11ea-8b25-0cc47a792c0a_id_a4c840de-5e10-11ea-8b25-0cc47a792c0a_files/wz_jsgraphics.js"></script>
</head>
<body>
<div style="position:absolute;left:50%;margin-left:-297px;top:0px;width:595px;height:841px;overflow:hidden">
    <div style="position:absolute;left:0px;top:0px">
        <img src="{{  asset('img/bills-background.jpg') }}" width=595 height=841></div>
    <div style="position:absolute;left:170.08px;top:51.42px" class="cls_002"><span class="cls_002">NAIROBI CITY COUNTY</span></div>
    <div style="position:absolute;left:226.77px;top:87.45px" class="cls_003"><span class="cls_003">Tel No: 020-344194,0725-624489,0735-825383</span></div>
    <div style="position:absolute;left:481.89px;top:86.80px" class="cls_004"><span class="cls_004">Customer Copy</span></div>
    <div style="position:absolute;left:255.12px;top:101.63px" class="cls_003"><span class="cls_003">Email: info@nairobi.go.ke</span></div>
    <div style="position:absolute;left:283.46px;top:115.80px" class="cls_003"><span class="cls_003">Emergency</span></div>
    <div style="position:absolute;left:28.35px;top:126.07px" class="cls_005"><span class="cls_005">Bill No: {{$bill->billNo}}</span></div>
    <div style="position:absolute;left:269.29px;top:129.97px" class="cls_003"><span class="cls_003">Tel No: 020-2222181</span></div>
    <div style="position:absolute;left:396.85px;top:127.37px" class="cls_006"><span class="cls_006">Date Issued {{date('d-m-Y')}}</span></div>
    <div style="position:absolute;left:170.08px;top:155.07px" class="cls_007"><span class="cls_007">CUSTOMER SERVICES OFFICE</span></div>
    <div style="position:absolute;left:170.08px;top:171.19px" class="cls_008"><span class="cls_008">The Customer Services Office Notifies</span></div>
    <div style="position:absolute;left:212.60px;top:184.72px" class="cls_009"><span class="cls_009">{{$bill->customer}}</span></div>
    <div style="position:absolute;left:31.18px;top:198.12px" class="cls_008"><span class="cls_008">that the amount shown is due to be paid at the National Bank of Kenya  OR MPESA ( Paybill No. 367776 : Account No. {{$bill->paymentCode}}</span></div>
    <div style="position:absolute;left:31.18px;top:212.29px" class="cls_008"><span class="cls_008">Amount KES {{number_format($bill->billTotal)}} ) at your earliest convenience.</span></div>
    <div style="position:absolute;left:184.25px;top:233.55px" class="cls_010"><span class="cls_010">{{$bill->customer}} </span></div>
    <div style="position:absolute;left:212.60px;top:254.93px" class="cls_006"><span class="cls_006">DETAIL OF CHARGES</span></div>
    <div style="position:absolute;left:28.35px;top:270.40px" class="cls_010"><span class="cls_010">NO</span></div>
    <div style="position:absolute;left:85.04px;top:270.40px" class="cls_010"><span class="cls_010">Account Number</span></div>
    <div style="position:absolute;left:198.43px;top:270.40px" class="cls_010"><span class="cls_010">Description</span></div>
    <div style="position:absolute;left:481.89px;top:270.40px" class="cls_010"><span class="cls_010">Amount (KES)</span></div>
    <div style="position:absolute;left:28.35px;top:290.25px" class="cls_010"><span class="cls_010">1</span></div>
    <div style="position:absolute;left:85.04px;top:290.25px" class="cls_010"><span class="cls_010">{{  $bill->accountNo }}</span></div>
    <div style="position:absolute;left:198.43px;top:290.25px" class="cls_010"><span class="cls_010">{{$bill->description}}</span></div>
    <div style="position:absolute;left:509.92px;top:290.25px" class="cls_010"><span class="cls_010">{{number_format($bill->billTotal)}}</span></div>
    <div style="position:absolute;left:481.89px;top:303.00px" class="cls_010"><span class="cls_010">-----------------------</span></div>
    <div style="position:absolute;left:28.35px;top:310.09px" class="cls_011"><span class="cls_011">Served By</span></div>
    <div style="position:absolute;left:85.04px;top:310.09px" class="cls_011"><span class="cls_011">{{Session::get('resource')[0]['user_full_name'] }}</span></div>
    <div style="position:absolute;left:509.92px;top:310.09px" class="cls_010"><span class="cls_010">{{number_format($bill->billTotal)}}</span></div>
    <div style="position:absolute;left:481.89px;top:319.36px" class="cls_009"><span class="cls_009">---------------------</span></div>
    <div style="position:absolute;left:0.00px;top:342.69px" class="cls_011"><span class="cls_011">========================================================================================</span></div>
    <div style="position:absolute;left:170.08px;top:380.24px" class="cls_002"><span class="cls_002">NAIROBI CITY COUNTY</span></div>
    <div style="position:absolute;left:226.77px;top:416.27px" class="cls_003"><span class="cls_003">Tel No: 020-344194,0725-624489,0735-825383</span></div>
    <div style="position:absolute;left:496.06px;top:415.62px" class="cls_004"><span class="cls_004">File Copy</span></div>
    <div style="position:absolute;left:255.12px;top:429.80px" class="cls_004"><span class="cls_004">Email: info@nairobi.go.ke</span></div>
    <div style="position:absolute;left:283.46px;top:443.97px" class="cls_004"><span class="cls_004">Emergency</span></div>
    <div style="position:absolute;left:28.35px;top:454.89px" class="cls_005"><span class="cls_005">Bill No: {{$bill->billNo}}</span></div>
    <div style="position:absolute;left:269.29px;top:458.14px" class="cls_004"><span class="cls_004">Tel No: 020-2222181</span></div>
    <div style="position:absolute;left:396.85px;top:456.19px" class="cls_006"><span class="cls_006">Date Issued {{date('d-m-Y')}}</span></div>
    <div style="position:absolute;left:170.08px;top:483.89px" class="cls_007"><span class="cls_007">CUSTOMER SERVICES OFFICE</span></div>
    <div style="position:absolute;left:170.08px;top:500.01px" class="cls_008"><span class="cls_008">The Customer Services Office Notifies</span></div>
    <div style="position:absolute;left:212.60px;top:513.53px" class="cls_009"><span class="cls_009">{{$bill->customer}}</span></div>
    <div style="position:absolute;left:31.18px;top:526.94px" class="cls_008"><span class="cls_008">that the amount shown is due to be paid at the National Bank of Kenya  OR MPESA ( Paybill No. 367776 : Account No. {{$bill->paymentCode}}</span></div>
    <div style="position:absolute;left:31.18px;top:541.11px" class="cls_008"><span class="cls_008">Amount KES {{number_format($bill->billTotal)}} ) at your earliest convenience.</span></div>
    <div style="position:absolute;left:212.60px;top:562.37px" class="cls_010"><span class="cls_010">{{$bill->customer}}</span></div>
    <div style="position:absolute;left:212.60px;top:583.75px" class="cls_006"><span class="cls_006">DETAIL OF CHARGES</span></div>
    <div style="position:absolute;left:28.35px;top:599.22px" class="cls_010"><span class="cls_010">NO</span></div>
    <div style="position:absolute;left:85.04px;top:599.22px" class="cls_010"><span class="cls_010">Account Number</span></div>
    <div style="position:absolute;left:198.43px;top:599.22px" class="cls_010"><span class="cls_010">Description</span></div>
    <div style="position:absolute;left:481.89px;top:599.22px" class="cls_010"><span class="cls_010">Amount (KES)</span></div>
    <div style="position:absolute;left:28.35px;top:619.07px" class="cls_010"><span class="cls_010">1</span></div>
    <div style="position:absolute;left:85.04px;top:619.07px" class="cls_010"><span class="cls_010">{{  $bill->accountNo }}</span></div>
    <div style="position:absolute;left:198.43px;top:619.07px" class="cls_010"><span class="cls_010">{{$bill->description}}</span></div>
    <div style="position:absolute;left:509.92px;top:619.07px" class="cls_010"><span class="cls_010">{{number_format($bill->billTotal)}}</span></div>
    <div style="position:absolute;left:481.89px;top:631.82px" class="cls_010"><span class="cls_010">-----------------------</span></div>
    <div style="position:absolute;left:28.35px;top:638.91px" class="cls_011"><span class="cls_011">Served By</span></div>
    <div style="position:absolute;left:85.04px;top:638.91px" class="cls_011"><span class="cls_011">{{Session::get('resource')[0]['user_full_name'] }}</span></div>
    <div style="position:absolute;left:509.92px;top:638.91px" class="cls_010"><span class="cls_010">{{number_format($bill->billTotal)}}</span></div>
    <div style="position:absolute;left:481.89px;top:648.18px" class="cls_009"><span class="cls_009">---------------------</span></div>
</div>

</body>
</html>
