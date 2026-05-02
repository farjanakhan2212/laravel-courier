@extends("layouts.master")

@section("page")

<?php
use App\Models\Parcel\CourierSender;
use App\Models\Courier\CourierParcel;

$senders = CourierSender::all();
$parcels = CourierParcel::all();
?>

<div class="card shadow-lg border-0">
    <div class="card-header bg-gradient-primary text-white d-flex justify-content-between align-items-center py-3 px-4">
        <h4 class="mb-0"><i class="fas fa-receipt me-2"></i>Create Invoice</h4>
        <a href="{{ url('invoice') }}" class="btn btn-light btn-sm">
            ← Back
        </a>
    </div>

    <div class="card-body p-4" style="background: #f8faff;">
        <style>
            .receipt-container {
                max-width: 920px;
                margin: auto;
                font-family: 'Segoe UI', sans-serif;
                background: white;
                padding: 30px;
                border-radius: 12px;
                box-shadow: 0 8px 20px rgba(0, 0, 0, 0.07);
                color: #333;
            }

            .receipt-header {
                text-align: center;
                margin-bottom: 30px;
            }

            .receipt-header img {
                height: 120px;
            }

            .receipt-header h2 {
                margin-top: 12px;
                color: #0d61fdff;
                font-weight: 700;
            }

            .section-title {
                font-weight: 600;
                margin: 30px 0 15px;
                font-size: 18px;
                color: #495057;
                border-bottom: 2px solid #0d6efd;
                padding-bottom: 6px;
            }

            .info-table td {
                padding: 10px;
                vertical-align: top;
                font-size: 15px;
            }

            .items-table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 15px;
            }

            .items-table th, .items-table td {
                border: 1px solid #dee2e6;
                padding: 10px;
                text-align: center;
                font-size: 14px;
            }

            .items-table th {
                background: linear-gradient(to right, #0d6efd, #4dabf7);
                color: white;
            }

            .items-table tr:nth-child(even) {
                background-color: #f1f5f9;
            }

            .btn-submit {
                margin-top: 30px;
                background: linear-gradient(to right, #198754, #20c997);
                border: none;
                padding: 12px 25px;
                color: #fff;
                font-size: 16px;
                font-weight: 600;
                border-radius: 6px;
                transition: background 0.3s;
            }

            .btn-submit:hover {
                background: linear-gradient(to right, #157347, #198754);
            }

            .signature-box {
                margin-top: 50px;
                display: flex;
                justify-content: space-between;
            }

            .signature {
                text-align: center;
                width: 45%;
            }

            .signature-line {
                border-top: 2px solid #495057;
                margin-top: 40px;
                padding-top: 6px;
                font-size: 14px;
                color: #666;
            }

            .total-section {
                font-size: 20px;
                text-align: right;
                font-weight: bold;
                margin-top: 20px;
                padding: 10px;
                background: #d0ebff;
                border-left: 5px solid #339af0;
                border-radius: 6px;
                color: #1c7ed6;
            }

            input[type="text"].form-control,
            select.form-control {
                padding: 6px;
                font-size: 14px;
                border-radius: 5px;
            }

            @media (max-width: 768px) {
                .signature-box {
                    flex-direction: column;
                    gap: 30px;
                }
            }
        </style>

        <div class="receipt-container">
            <div class="receipt-header">
                <img src="{{ asset('dist/img/courier.jpg') }}" width="100"  alt=" Courier Logo">
             
                <h2>Courier Management</h2>
                <p>123 Tech Street, Silicon Valley, USA</p>
                <p>Phone: +1-800-APPLE | Email: info@applegadget.com</p>
                <h4 class="mt-4 text-primary">Invoice</h4>
            </div>

            <div class="section-title">Sender & Payment Info</div>
            <table class="info-table w-100">
                <tr>
                    <td><strong>Invoice No:</strong> {{ $next_id ?? '001' }}</td>
                    <td><strong>Date:</strong> <span id="date">{{ date('d-M-Y') }}</span></td>
                </tr>
                <tr>
                    <td>
                        <strong>Sender:</strong>
                        <select id="sender_id" class="form-control">
                            @foreach($senders as $sender)
                                <option value="{{ $sender->id }}">{{ $sender->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td><strong>Payment Method:</strong> Cash</td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <strong>Remark</strong><br>
                        <textarea name="remark" id="remark"></textarea>
                    </td>
                </tr>
            </table>

            <div class="section-title">Parcels / Charges</div>
            <table class="items-table">
                <thead>
                    <tr>
                        <th>Parcel ID</th>
                      
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Amount</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <td>
                            <select name="parcel" id="parcel" class="form-control">
                                @foreach ($parcels as $parcel)
                                    <option value="{{ $parcel->id }}">{{ $parcel->id }}</option>
                                @endforeach
                            </select> 
                        </td>
                        
                        <td><input type="text" id="qty" value="1" class="form-control" /></td>
                        <td><input type="text" id="price" class="form-control" /></td>
                        <td></td>
                        <td><input type="button" value=" + " id="btnAdd" class="btn btn-sm btn-outline-success" /></td>
                    </tr>
                </thead>
                <tbody id="tbody"></tbody>
            </table>

            <div class="total-section">
                Total: $<span id="total">0</span>
            </div>

            <button class="btn-submit" onclick="CreateMr()">
                <i class="fas fa-check-circle me-2"></i>Create Invoice
            </button>

            <div class="signature-box">
                <div class="signature">
                    <div class="signature-line">sender Signature</div>
                </div>
                <div class="signature">
                    <div class="signature-line">Authorized Signature</div>
                </div>
            </div>
        </div>

        <script>
            let base_url = "{{ url('api') }}";
            let cart = [];

            document.querySelector("#btnAdd").addEventListener("click", () => {
                let qty = document.querySelector("#qty").value;
                let price = document.querySelector("#price").value;
                let parcel_id = document.querySelector("#parcel").value;
                // let parcel_name = document.querySelector("#parcel_id").options[document.querySelector("#parcel_id").selectedIndex].text;

                if (!qty || !price) return alert("Please enter quantity and price.");

                let lineTotal = qty * price;

                let json = {
                    id: cart.length + 1,
                    parcel_id,
                    qty,
                    price,
                    lineTotal: lineTotal
                };
                console.log(json);

                cart.push(json);
                printCart();
            });

            function printCart() {
                let html = "";
                let total = 0;
                cart.forEach((parcel) => {
                    html += `<tr>`;
                    html += `<td>${parcel.parcel_id}</td>`;
                    html += `<td>${parcel.qty}</td>`;
                    html += `<td>${parcel.price}</td>`;
                    html += `<td>${parcel.lineTotal.toFixed(2)}</td>`;
                    html += `<td><button class="btn btn-danger btn-sm" onclick="del(${parcel.id})">Del</button></td>`;
                    html += `</tr>`;
                    total += Number(parcel.lineTotal);
                });

                document.querySelector("#tbody").innerHTML = html;
                document.querySelector("#total").innerHTML = total.toFixed(2);
            }

            function del(id) {
                cart = cart.filter(parcel => parcel.id !== id);
                printCart();
            }

            async function CreateMr() {
                if (confirm("Are you sure you want to create this invoice?")) {
                    let date = document.querySelector("#date").innerHTML;
                    let sender_id = document.querySelector("#sender_id").value;
                    let total = document.querySelector("#total").innerHTML;
                    let remark=document.getElementById('remark').value;

                    let jsonData = {
                        // created_at: date,
                        // updated_at: date,
                        sender_id: sender_id,
                        remark: remark,
                        invoice_total: total,
                        parcels: cart
                    };
                    console.log(jsonData);
                    try {
                        let response = await fetch(`http://farjana.intelsofts.com/Projects/Laravel/Courier/api/invoices`, {
                            method: "POST",
                            headers: { "Content-Type": "application/json", 'Accept':'application/json' },
                            body: JSON.stringify(jsonData)
                        });

                        let json = await response.json();
                        alert("Invoice created successfully!");
                        cart = [];
                        printCart();
                    } catch (error) {
                        alert("An error occurred while saving the invoice.");
                        
                    }
                }
            }
        </script>
    </div>
</div>

@endsection
