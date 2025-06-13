<div>
    <!-- ตาราง Order -->
    <div>
        <table id="table-order" class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{ __('Order ID') }}</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{ __('Customer name') }}</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{ __('Order price') }}</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{ __('Order date') }}</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{ __('Actions') }}</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200"></tbody>
        </table>
    </div>


    <!-- Modal View (ข้อมูลแสดง Order) -->
    <div class="fixed z-10 inset-0 overflow-y-auto hidden" id="modal-view" aria-labelledby="modal-view-title"
        role="dialog" aria-modal="true">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity bg-gray-500 opacity-75" aria-hidden="true"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
            <div class="inline-block align-bottom rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-4xl sm:w-full"
                style="background: linear-gradient(135deg, #f43f5e 0%, #fbbf24 40%, #34d399 80%, #3b82f6 100%);">
                <div class="px-4 pt-5 pb-4 sm:p-6 bg-white bg-opacity-80 rounded-lg">
                    <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">ข้อมูล Order</h3>
                    <div class="grid grid-cols-1 gap-4 mb-4">
                        <div>
                            <label
                                class="block text-sm font-semibold flex items-center gap-1 bg-gradient-to-r from-red-500 via-yellow-500 to-green-500 text-transparent bg-clip-text">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10" />
                                    <line x1="12" y1="16" x2="12" y2="12" />
                                    <line x1="12" y1="8" x2="12.01" y2="8" />
                                </svg>
                                Order ID:
                            </label>
                            <p id="order-id" class="text-sm text-gray-900">-</p>
                        </div>

                        <div>
                            <label
                                class="block text-sm font-semibold flex items-center gap-1 bg-gradient-to-r from-orange-500 via-pink-500 to-purple-500 text-transparent bg-clip-text">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 21v-2a4 4 0 0 0-3-3.87" />
                                    <path d="M4 21v-2a4 4 0 0 1 3-3.87" />
                                    <circle cx="12" cy="7" r="4" />
                                </svg>
                                Customer Name:
                            </label>
                            <p id="customer-name" class="text-sm text-gray-900">-</p>
                        </div>

                        <div>
                            <label
                                class="block text-sm font-semibold flex items-center gap-1 bg-gradient-to-r from-yellow-500 via-green-500 to-blue-500 text-transparent bg-clip-text">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2" />
                                    <line x1="16" y1="2" x2="16" y2="6" />
                                    <line x1="8" y1="2" x2="8" y2="6" />
                                    <line x1="3" y1="10" x2="21" y2="10" />
                                </svg>
                                Order Date:
                            </label>
                            <p id="order-date" class="text-sm text-gray-900">-</p>
                        </div>
                        <div>
                            <label
                                class="block text-sm font-semibold flex items-center gap-1 bg-gradient-to-r from-green-500 via-blue-500 to-purple-500 text-transparent bg-clip-text">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10" />
                                    <line x1="12" y1="8" x2="12" y2="16" />
                                    <line x1="9" y1="11" x2="15" y2="11" />
                                </svg>
                                Order Price:
                            </label>
                            <p id="order-price" class="text-sm text-gray-900">-</p>
                        </div>
                    </div>
                    <!-- ตารางแสดงเครื่องดื่มที่สั่ง -->
                    <div>
                        <label
                            class="flex justify-between items-center text-sm font-semibold mb-2 bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 text-transparent bg-clip-text">
                            <span>Drinks Ordered:</span>
                        </label>

                        <!-- ตาราง -->
                        <div class="overflow-x-auto">
                            <table class="min-w-full border border-gray-300 text-sm">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="border border-gray-300 px-3 py-2 text-left">Drink ID</th>
                                        <th class="border border-gray-300 px-3 py-2 text-left">Drink Name</th>
                                        <th class="border border-gray-300 px-3 py-2 text-right">Drink Price</th>
                                        <th class="border border-gray-300 px-3 py-2 text-right">Quantity</th>
                                        <th class="border border-gray-300 px-3 py-2 text-right">Total Price</th>
                                        <th class="border border-gray-300 px-3 py-2 text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="drink-list"></tbody>
                            </table>
                            <!-- ตัวอย่าง modal หรือกล่องแก้ไข -->
                            <div id="editModal"
                                class="hidden fixed top-1/4 left-1/2 transform -translate-x-1/2 bg-gradient-to-r from-pink-400 via-yellow-400 to-green-400 p-8 rounded-2xl shadow-2xl z-50 text-white w-[400px]">

                                <h3 class="text-2xl font-bold text-center mb-6">แก้ไขรายการ</h3>

                                <input type="hidden" id="edit-drink-id" />

                                <!-- ชื่อเครื่องดื่ม -->
                                <div class="mb-4 flex justify-between items-center">
                                    <label class="text-lg font-semibold w-1/3">ชื่อเครื่องดื่ม:</label>
                                    <span id="edit-drink-name" class="text-xl font-bold w-2/3 text-right"></span>
                                </div>

                                <!-- ราคา -->
                                <div class="mb-4 flex justify-between items-center">
                                    <label class="text-lg font-semibold w-1/3">Price:</label>
                                    <span id="edit-price" class="text-xl font-bold w-2/3 text-right"></span>
                                </div>

                                <!-- จำนวน -->
                                <div class="mb-4 flex justify-between items-center">
                                    <label for="edit-quantity" class="text-lg font-semibold w-1/3">Quantity:</label>
                                    <input type="text" id="edit-quantity"
                                        oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                                        class="w-2/3 p-2 rounded border border-gray-300 text-black text-lg text-right" />
                                </div>

                                <!-- ราคารวม -->
                                <div class="mb-6 flex justify-between items-center">
                                    <label class="text-lg font-semibold w-1/3">Total Price:</label>
                                    <span id="edit-total-price" class="text-xl font-bold w-2/3 text-right"></span>
                                </div>

                                <!-- ปุ่ม -->
                                <div class="flex justify-end gap-3">
                                    <button onclick="closeEdit()"
                                        class="bg-red-500 hover:bg-red-700 text-white font-semibold px-5 py-2 rounded-lg shadow text-lg">ยกเลิก</button>
                                    <button onclick="saveEdit()"
                                        class="bg-green-400 text-white font-semibold px-5 py-2 rounded-lg shadow hover:bg-green-600 text-lg">บันทึก</button>
                                </div>
                            </div> 
                        </div>
                    </div>
                    <button type="button" onclick="closeModalView()"
                        class="mt-3 w-full inline-flex justify-center rounded-md border border-transparent bg-white bg-opacity-70 px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-opacity-90 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        ปิด
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit (แยกออกมาข้างนอก modal-view) -->
    <div class="fixed z-10 inset-0 overflow-y-auto hidden" id="modal-edit" aria-labelledby="modal-edit-title"
        role="dialog" aria-modal="true">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity bg-gray-500 opacity-75" aria-hidden="true"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6">
                    <h3 class="text-lg leading-6 font-bold mb-4 bg-gradient-to-r from-red-500 via-yellow-500 to-green-500 text-transparent bg-clip-text"
                        id="modal-edit-title">
                        แก้ไข Order
                    </h3>
                    <form id="form-edit-order">
                        <input type="hidden" id="edit-order-id" name="order_id" />
                        <div class="mb-4">
                            <label for="edit-customer-name"
                                class="block text-sm font-semibold bg-gradient-to-r from-pink-500 via-purple-500 to-indigo-500 text-transparent bg-clip-text mb-1">
                                Customer Name
                            </label>
                            <input type="text" id="edit-customer-name" name="customer_name"
                                class="mt-1 block w-full rounded-md border-2 border-transparent shadow-sm
               focus:ring-2 focus:ring-offset-1 focus:ring-pink-500 focus:border-pink-500
               sm:text-sm transition-colors" />
                        </div>
                    </form>
                </div>

                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button" id="btn-save-edit"
                        class="inline-flex justify-center rounded-md border border-transparent
           bg-gradient-to-r from-pink-500 via-red-500 to-yellow-400
           px-4 py-2 text-sm font-medium text-white shadow-sm
           hover:from-pink-600 hover:via-red-600 hover:to-yellow-500
           focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-400
           sm:ml-3 sm:w-auto sm:text-sm transition-colors duration-300">
                        บันทึก
                    </button>
                    <button type="button" onclick="closeModalEdit()"
                        class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm
           px-4 py-2 bg-gradient-to-r from-green-400 via-blue-500 to-purple-600
           text-white font-medium hover:from-green-500 hover:via-blue-600 hover:to-purple-700
           sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm transition-colors duration-300">
                        ปิด
                    </button>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    // ฟังก์ชันสำหรับค้นหา customer id จากชื่อ customer ใน array customersList
    function findCustomerIdByName(name) {
        if (!name) return null; // ถ้าไม่ส่งชื่อมา ให้คืนค่า null
        // ใช้ find หาชื่อที่ตรงกับ input (ไม่สนใจตัวพิมพ์ใหญ่เล็ก)
        let customer = customersList.find(c => c.name.toLowerCase() === name.toLowerCase());
        // ถ้าพบ customer คืน id ถ้าไม่เจอคืน null
        return customer ? customer.id : null;
    }

    var list_table; // ตัวแปรเก็บ DataTable object

    $(document).ready(function() {
        // สร้าง DataTable สำหรับ #table-order โดยตั้งค่าการทำงานต่าง ๆ
        list_table = $('#table-order').DataTable({
            pageLength: 5, // แสดง 5 แถวต่อหน้า
            responsive: true, // รองรับ responsive
            processing: true, // แสดงสถานะ processing ระหว่างโหลดข้อมูล
            serverSide: true, // ใช้การโหลดข้อมูลแบบ server-side
            serverMethod: 'post', // ใช้ POST method ในการดึงข้อมูล
            ajax: {
                url: '{{ route('orders.data.list') }}', // URL สำหรับดึงข้อมูล orders
                type: "post", // method POST
            },
            columns: [{
                    data: 'order_id'
                }, // แสดงข้อมูล order_id
                {
                    data: 'customer_name'
                }, // แสดงชื่อลูกค้า
                {
                    data: 'total_price',
                    className: 'text-center'
                }, // แสดงราคาทั้งหมด และจัดกลางข้อความ
                {
                    data: 'created_at',
                    className: 'text-center'
                }, // แสดงวันที่สร้าง order และจัดกลางข้อความ
                {
                    // แสดงปุ่ม View, Edit, Delete ในคอลัมน์สุดท้าย
                    data: null,
                    render: function(data, type, row) {
                        // HTML ปุ่มที่ใช้เรียก event ต่าง ๆ
                        return `
                            <div class="flex justify-center">
                                <a class="btn-view btn-actions inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase hover:bg-gray-700 active:bg-gray-900 cursor-pointer">View</a>
                                <a class="btn-edit btn-actions inline-flex items-center px-4 py-2 ml-2 bg-indigo-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase hover:bg-indigo-700 active:bg-indigo-900 cursor-pointer">Edit</a>
                                <button type="button" class="btn-delete btn-actions inline-flex items-center px-4 py-2 ml-2 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase hover:bg-red-700 active:bg-red-900 cursor-pointer">Delete</button>
                            </div>`;
                    },
                    orderable: false, // ไม่อนุญาตให้ sort คอลัมน์นี้
                    className: 'text-center' // จัดข้อความตรงกลาง
                }
            ],
        });

        // เมื่อกดปุ่ม View
        $(document).on('click', '.btn-view', function() {
            // ดึงข้อมูลแถวที่ปุ่มนั้นอยู่
            var row = list_table.row($(this).closest('tr')).data();
            // เรียกฟังก์ชันเปิด modal แสดงรายละเอียด order
            openOrderModal(row);
            console.log(row); // แสดงข้อมูล order ใน console (debug)
        });

        // เมื่อกดปุ่ม Edit
        $(document).on('click', '.btn-edit', function() {
            // ดึงข้อมูลแถวที่ปุ่มนั้นอยู่
            var row = list_table.row($(this).closest('tr')).data();
            // เรียกฟังก์ชันเปิด modal แก้ไข order
            openEditModal(row);
        });

        // เมื่อกดปุ่ม Delete
        $(document).on('click', '.btn-delete', function() {
            // ดึงข้อมูลแถวที่ปุ่มนั้นอยู่
            var row = list_table.row($(this).closest('tr')).data();
            var orderId = row.order_id; // ดึง id ของ order

            // แสดงกล่อง confirm ยืนยันการลบด้วย SweetAlert2
            Swal.fire({
                title: 'ยืนยันการลบ',
                text: 'ต้องการลบคำสั่งซื้อ #' + orderId + ' ใช่หรือไม่?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'ใช่',
                cancelButtonText: 'ยกเลิก',
            }).then((result) => {
                if (result.isConfirmed) {
                    // ถ้าผู้ใช้กดยืนยัน ให้ส่งคำสั่งลบไปที่ API ด้วย AJAX
                    $.ajax({
                        type: "DELETE", // ใช้ method DELETE
                        url: "/api/orders/" + orderId, // URL สำหรับลบ order ที่ระบุ id
                        headers: {
                            // ใส่ token สำหรับป้องกัน CSRF
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            if (response.code == 200) {
                                // ถ้าลบสำเร็จ แจ้งเตือน success
                                Swal.fire('สำเร็จ', response.message, 'success');
                                list_table.ajax.reload(); // โหลดข้อมูลตารางใหม่
                            } else {
                                // ถ้าเกิดข้อผิดพลาด แจ้งเตือน error
                                Swal.fire('ผิดพลาด', response.message, 'error');
                            }
                        },
                        error: function(xhr) {
                            // แจ้งเตือน error หาก AJAX ล้มเหลว
                            Swal.fire('ผิดพลาด', xhr.responseJSON?.message ||
                                'ไม่สามารถลบได้', 'error');
                        }
                    });
                }
            });
        });

        // เมื่อกดปุ่มบันทึกใน modal แก้ไข order
        $('#btn-save-edit').on('click', function() {
            // ดึงค่าจาก input ใน modal
            var orderId = $('#edit-order-id').val();
            var customerName = $('#edit-customer-name').val();
            var totalPrice = $('#edit-total-price').val();

            // ตรวจสอบข้อมูลว่าครบไหม
            if (!orderId || !customerName || totalPrice === '') {
                Swal.fire({
                    title: 'ข้อมูลไม่ครบถ้วน',
                    text: 'กรุณากรอกข้อมูลให้ครบทุกช่อง',
                    icon: 'warning',
                });
                return; // หยุดถ้าไม่ครบ
            }

            // แสดง confirm ยืนยันก่อนอัพเดทข้อมูล
            Swal.fire({
                title: 'ยืนยันการอัพเดทข้อมูล',
                text: 'คุณต้องการอัพเดทออเดอร์ของลูกค้า ' + customerName + ' ใช่หรือไม่ ?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ยืนยัน',
                cancelButtonText: 'ยกเลิก',
            }).then((result) => {
                if (result.isConfirmed) {
                    // ถ้าผู้ใช้กดยืนยัน ส่งข้อมูลอัพเดทไปที่ server ด้วย AJAX PUT
                    $.ajax({
                        type: "PUT",
                        url: "{{ route('order.update') }}", // URL route สำหรับอัพเดท order
                        data: {
                            order_id: orderId,
                            customer_name: customerName,
                            total_price: totalPrice,
                        },
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            if (response.code == 200) {
                                // อัพเดทสำเร็จ แสดงข้อความและปิด modal
                                Swal.fire({
                                    title: response.message,
                                    text: 'ข้อมูลออเดอร์ของลูกค้า ' +
                                        customerName +
                                        ' ได้รับการอัพเดทแล้ว',
                                    icon: 'success',
                                });
                                if (typeof list_table !== 'undefined' &&
                                    list_table !== null) {
                                    list_table.clear()
                                        .draw(); // เคลียร์และวาดตารางใหม่
                                }
                                closeModalEdit(); // ปิด modal แก้ไข
                            } else {
                                // ถ้า error แสดง error message
                                Swal.fire({
                                    title: 'เกิดข้อผิดพลาด',
                                    text: response.message,
                                    icon: 'error',
                                    confirmButtonText: 'ตกลง',
                                });
                            }
                        },
                        error: function(xhr) {
                            var errorMsg = 'ไม่สามารถอัพเดทข้อมูลได้';
                            if (xhr.responseJSON && xhr.responseJSON.message) {
                                errorMsg = xhr.responseJSON.message;
                            }
                            Swal.fire({
                                title: 'เกิดข้อผิดพลาด',
                                text: errorMsg,
                                icon: 'error',
                                confirmButtonText: 'ตกลง',
                            });
                        }
                    });
                }
            });
        });
    });

    // ฟังก์ชันปิด modal แสดงรายละเอียด order
    function closeModalView() {
        $('#modal-view').addClass('hidden');
    }

    // ฟังก์ชันปิด modal แก้ไข order
    function closeModalEdit() {
        $('#modal-edit').addClass('hidden');
    }

    // ฟังก์ชันเปิด modal แก้ไข order พร้อมใส่ข้อมูลในฟอร์ม
    function openEditModal(order) {
        $('#edit-order-id').val(order.order_id); // ใส่ order_id ลง input
        $('#edit-customer-name').val(order.customer_name); // ใส่ชื่อลูกค้า
        $('#edit-total-price').val(order.total_price); // ใส่ราคาทั้งหมด
        $('#modal-edit').removeClass('hidden'); // แสดง modal
    }

    // ฟังก์ชันเปิด modal แสดงรายละเอียด order
    function openOrderModal(order) {
        // แสดงข้อมูล order ใน modal
        $('#order-id').text(order.order_id);
        $('#customer-name').text(order.customer_name);
        $('#order-date').text(order.created_at);
        $('#order-price').text(order.total_price);

        const tbody = $('#drink-list'); // ตารางแสดงรายการเครื่องดื่มใน order
        tbody.empty(); // ล้างข้อมูลใน tbody ก่อน
        tbody.append('<tr><td colspan="6" class="text-center py-2">Loading...</td></tr>'); // แสดง loading
        tbody.empty(); // ล้าง loading ออกก่อนแสดงข้อมูลจริง

        // ถ้า order มี order_items
        if (order.order_items.length > 0) {
            // วนลูปแสดงรายการเครื่องดื่มใน order
            order.order_items.forEach(item => {
                const totalPrice = item.drinks.price * item.quantity; // คำนวณราคาทั้งหมดของแต่ละ item
                const tr = `
                    <tr data-drinks-id="${item.drinks.id}">
                        <td class="border border-gray-300 px-3 py-2">${item.drinks.id}</td>
                        <td class="border border-gray-300 px-3 py-2">${item.drinks.name}</td>
                        <td class="border border-gray-300 px-3 py-2 text-right">${item.drinks.price}</td>
                        <td class="border border-gray-300 px-3 py-2 text-right">${item.quantity}</td>
                        <td class="border border-gray-300 px-3 py-2 text-right">${totalPrice}</td>
                       <td class="border border-gray-300 px-3 py-2 text-center space-x-1">
                        <button
                        class="bg-blue-600 text-white font-semibold px-4 py-2 rounded-md shadow-md
                            hover:bg-blue-700 hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-400
                            transition duration-300 ease-in-out mr-2"
                        data-id="${item.id}"
                        data-drinks_id="${item.drinks.id}"
                        data-quantity="${item.quantity}"
                        onclick="editOrderItem(this)">
                        แก้ไข Order Item
                    </button>
                        <button
                            class="bg-yellow-500 text-white font-semibold px-4 py-2 rounded-md shadow-md
                                hover:bg-yellow-600 hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-yellow-400
                                transition duration-300 ease-in-out mr-2"
                            data-id="${item.id}"
                            data-name="${item.drinks.name}"
                            data-price="${item.drinks.price}"
                            data-quantity="${item.quantity}"
                            onclick="editOrderItem(this)">
                            แก้ไข
                        </button>
                            <button
                                class="bg-red-600 text-white font-semibold px-4 py-2 rounded-md shadow-md
                                    hover:bg-red-700 hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-red-400
                                    transition duration-300 ease-in-out"
                                data-id="${item.id}"
                                data-name="${item.drinks.name}"
                                onclick="removeOrderItem(this)">
                                ลบ
                            </button>
                        </td>
                    </tr>
                `;
                tbody.append(tr); // แทรกแถวแต่ละ item เข้า tbody
            });
        } else {
            // ถ้าไม่มีรายการเครื่องดื่มแสดงข้อความ
            tbody.append('<tr><td colspan="6" class="text-center py-2">No drinks found</td></tr>');
        }
        $('#modal-view').removeClass('hidden'); // แสดง modal แสดงรายละเอียด order
    }

    // ตัวอย่างฟังก์ชันอัพเดทราคาทั้งหมด (ถ้าอยากใช้)
    function updateTotalPrice() {
        let total = 0;
        $('#drink-list tr').each(function() {
            const price = parseFloat($(this).find('td.total-price').text()) || 0;
            total += price;
        });
        $('#order-price').text(total.toFixed(2));
    }

    // ฟังก์ชันลบ OrderItem ใน modal รายละเอียด order
    function removeOrderItem(button) {
        var orderitemId = $(button).data('id'); // ดึง id ของ orderitem
        var orderitemName = $(button).data('name'); // ดึงชื่อเครื่องดื่ม

        if (!orderitemId) {
            Swal.fire({
                title: 'เกิดข้อผิดพลาด',
                text: 'ไม่พบรหัส OrderItem!',
                icon: 'error',
                confirmButtonText: 'ตกลง',
            });
            return;
        }

        Swal.fire({
            title: 'ยืนยันการลบข้อมูล',
            text: 'คุณต้องการลบ OrderItem ( ' + orderitemId + ' : ' + orderitemName + ' ) ใช่หรือไม่ ?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'ยืนยัน',
            cancelButtonText: 'ยกเลิก',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "DELETE",
                    url: "api/orderitems/delete/" + orderitemId,
                    dataType: 'JSON',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.status === 'success') {
                            // ลบแถว OrderItem ใน modal ทันที (remove <tr> ที่ปุ่มนี้อยู่)
                            $(button).closest('tr').remove();

                            // เช็คว่าตาราง order items ยังมีแถวหรือไม่
                            if ($('#drink-list tr').length === 0) {
                                // ถ้าไม่มีแถวเลย แสดงข้อความว่าไม่มีรายการเครื่องดื่ม
                                $('#drink-list').append(
                                    '<tr><td colspan="6" class="text-center py-2">ไม่มีรายการเครื่องดื่ม</td></tr>'
                                );
                            }

                            // อัปเดตราคาทั้งหมดใน modal
                            updateTotalPrice();

                            // โหลดข้อมูลตารางหลักใหม่ทันที
                            if (typeof list_table !== 'undefined' && list_table !== null) {
                                list_table.ajax.reload(null,
                                    false); // โหลดข้อมูลใหม่แบบไม่รีเซ็ตหน้า
                            }

                            Swal.fire({
                                title: 'สำเร็จ!',
                                text: 'ลบ OrderItem ( ' + orderitemId + ' : ' +
                                    orderitemName + ' ) เรียบร้อยแล้ว',
                                icon: 'success',
                            });
                        } else {
                            Swal.fire({
                                title: 'เกิดข้อผิดพลาด',
                                text: response.message,
                                icon: 'error',
                            });
                        }
                    },
                    error: function(xhr) {
                        Swal.fire({
                            title: 'เกิดข้อผิดพลาด',
                            text: xhr.responseJSON ? xhr.responseJSON.message :
                                'ไม่สามารถลบได้',
                            icon: 'error',
                        });
                    }
                });
            }
        });
    }


    // ฟังก์ชันเปิด modal แก้ไข order item
    function editOrderItem(button) {
        // ดึงค่า id และ name จาก attribute ของปุ่ม
        const id = button.getAttribute('data-id');
        const name = button.getAttribute('data-name');

        // ดึงค่า price และ quantity จาก attribute ของปุ่ม
        const price = parseFloat(button.getAttribute('data-price'));
        const quantity = parseInt(button.getAttribute('data-quantity'));

        // กำหนดค่า id (ซ่อน), ชื่อเครื่องดื่ม, ราคา, quantity และราคาทั้งหมดใน modal
        document.getElementById('edit-drink-id').value = id;
        document.getElementById('edit-drink-name').textContent = name; // <-- เพิ่มบรรทัดนี้
        document.getElementById('edit-price').textContent = price.toFixed(2);
        document.getElementById('edit-quantity').value = quantity;
        document.getElementById('edit-total-price').textContent = (price * quantity).toFixed(2);

        // แสดง modal
        document.getElementById('editModal').style.display = 'block';

        // เมื่อ quantity ถูกเปลี่ยน ให้คำนวณราคาใหม่และแสดงใน total-price
        document.getElementById('edit-quantity').oninput = function() {
            let q = parseInt(this.value);
            if (isNaN(q) || q < 1) q = 1; // ตรวจสอบค่าที่รับมา ถ้าไม่ถูกต้องให้ default เป็น 1
            this.value = q;
            document.getElementById('edit-total-price').textContent = (price * q).toFixed(2);
        }
    }


    // ฟังก์ชันปิด modalEdit
    function closeEdit() {
        document.getElementById('editModal').style.display = 'none';
    }

    // ฟังก์ชันบันทึกข้อมูลหลังจากแก้ไข quantity
    function saveEdit() {
        const id = document.getElementById('edit-drink-id').value;
        const quantity = parseInt(document.getElementById('edit-quantity').value);

        fetch(`/api/orderitems/update/${id}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    quantity: quantity
                })
            })
            .then(response => {
                if (!response.ok) throw new Error('Network response was not ok');
                return response.json();
            })
            .then(data => {
                Swal.fire({
                    icon: 'success',
                    title: 'บันทึกสำเร็จ',
                    showConfirmButton: false,
                    timer: 1500
                });
                closeEdit();
                setTimeout(() => location.reload(), 1600); // รอให้ popup แสดงก่อน reload
            })
            .catch(error => {
                Swal.fire({
                    icon: 'error',
                    title: 'เกิดข้อผิดพลาด',
                    text: error.message
                });
            });
    }

    // ทำอยู่นะ
</script>
