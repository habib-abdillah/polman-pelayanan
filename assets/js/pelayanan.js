$(document).ready(function () {
	// Fecth Function data laporan
	function fetch(start_date, end_date) {
		$.ajax({
			url: base_url + "laporan/filter_data",
			type: "POST",
			data: {
				start_date: start_date,
				end_date: end_date,
			},
			dataType: "json",
			success: function (data) {
				var i = "1";
				$("#table_laporan").DataTable({
					responsive: true,
					// lengthChange: false,
					buttons: ["copy", "excel", "print", "pdf", "colvis"],
					dom:
						"<'row'<'col-md-3'l><'col-md-6 d-flex justify-content-center'B><'col-md-3'f>>" +
						"<'row'<'col-lg-12'tr>>" +
						"<'row'<'col-md-5'i><'col-md-7'p>>",
					data: data,
					columns: [
						{
							data: "id_transaksi",
							render: function (data, type, row, meta) {
								return i++;
							},
						},
						{
							data: "id_transaksi",
						},
						{
							data: "nama_pelayanan",
						},
						{
							data: "qty",
						},
						{
							data: "harga",
							render: $.fn.dataTable.render.number(".", ",", 0, "Rp "),
						},
						{
							data: "subtotal",
							render: $.fn.dataTable.render.number(".", ",", 0, "Rp "),
						},
						{
							data: "created_at",
							render: function (data, type, row, meta) {
								return moment(row.created_at).format("DD MMMM YYYY");
							},
						},
					],
				});
			},
		});
	}
	fetch();

	// Filter data laporan
	$(document).on("click", "#filter", function (e) {
		e.preventDefault();
		var start_date = $("#start_date").val();
		var end_date = $("#end_date").val();

		if (start_date == "" || end_date == "") {
			Swal.fire({
				icon: "error",
				title: "Sorry",
				text: "Data tanggal diperlukan!",
			});
		} else {
			$("#table_laporan").DataTable().destroy();
			fetch(start_date, end_date);
		}
	});

	// Reset filter data laporan
	$(document).on("click", "#reset", function (e) {
		e.preventDefault();
		$("#start_date").val("");
		$("#end_date").val("");

		$("#table_laporan").DataTable().destroy();
		fetch();
	});

	//Datatables
	var table = $("#example").DataTable({
		responsive: true,
		// lengthChange: false,
		buttons: ["copy", "excel", "print", "pdf", "colvis"],
		dom:
			"<'row'<'col-md-3'l><'col-md-6 d-flex justify-content-center'B><'col-md-3'f>>" +
			"<'row'<'col-lg-12'tr>>" +
			"<'row'<'col-md-5'i><'col-md-7'p>>",
	});

	table.buttons().container().appendTo("#example_wrapper .col-md-6:eq(0)");
	$("#table-transaksi").DataTable({
		responsive: true,
		searching: false,
		info: false,
		ordering: false,
		paging: false,
	});

	//Masking input uang
	$(".uang").mask("000.000.000", {
		reverse: true,
	});

	//Validasi Form
	(() => {
		"use strict";
		// Fetch all the forms we want to apply custom Bootstrap validation styles to
		const forms = document.querySelectorAll(".needs-validation");
		// Loop over them and prevent submission
		Array.from(forms).forEach((form) => {
			form.addEventListener(
				"submit",
				(event) => {
					if (!form.checkValidity()) {
						event.preventDefault();
						event.stopPropagation();
					}
					form.classList.add("was-validated");
				},
				false
			);
		});
	})();

	//Reset Modal After Close
	$("#inputModal").on("hidden.bs.modal", function () {
		$(this).find("#inputForm")[0].reset();
		$(this).find("#inputForm").removeClass("was-validated");
	});

	$("#editModal").on("hidden.bs.modal", function () {
		$(this).find("#editForm")[0].reset();
		$(this).find("#editForm").removeClass("was-validated");
	});

	$("#resetpasswordModal").on("hidden.bs.modal", function () {
		$(this).find("#resetForm")[0].reset();
		$(this).find("#resetForm").removeClass("was-validated");
	});

	//Edit data dan lihat data
	$(document).on("click", "#getdata", function () {
		var id = $(this).data("id");
		var nama = $(this).data("nama");
		var username = $(this).data("username");
		var role = $(this).data("role");
		var status = $(this).data("status");
		var keterangan = $(this).data("keterangan");
		$("#idedit").val(id);
		$("#editNamaUser").val(nama);
		$("#editUsername").val(username);
		$("#editRole").val(role);
		$("#editStatusAktif").val(status);
		$("#editKeterangan").val(keterangan);
		$("#idreset").val(id);
	});
	$(document).on("click", "#editPelanggan", function () {
		var idPelanggan = $(this).data("id");
		var nama = $(this).data("nama");
		var instansi = $(this).data("instansi");
		var status = $(this).data("status");
		var keterangan = $(this).data("keterangan");
		$("#idPelangganEdit").val(idPelanggan);
		$("#editNamaPelanggan").val(nama);
		$("#editNamaInstansi").val(instansi);
		$("#editStatusAktif").val(status);
		$("#editKeterangan").val(keterangan);
	});
	$(document).on("click", "#editPembayaran", function () {
		var idPembayaran = $(this).data("id");
		var jenis = $(this).data("jenis");
		var status = $(this).data("status");
		var keterangan = $(this).data("keterangan");
		$("#idPembayaranEdit").val(idPembayaran);
		$("#editJenisPembayaran").val(jenis);
		$("#editStatusAktif").val(status);
		$("#editKeterangan").val(keterangan);
	});

	//Add Chart
	$("#pelayanan").on("change", function () {
		var idpelayanan = $("#pelayanan option:selected").data("idpelayanan");
		var kodepelayanan = $("#pelayanan option:selected").data("kodepelayanan");
		var namapelayanan = $("#pelayanan option:selected").data("namapelayanan");
		var harga_pelayanan = $("#pelayanan option:selected").data("harga");
		var quantity = $("#quantity").val();
		// alert(harga_pelayanan);
	});
	$("#add_cart").click(function () {
		var idpelayanan = $("#pelayanan option:selected").data("idpelayanan");
		var kodepelayanan = $("#pelayanan option:selected").data("kodepelayanan");
		var namapelayanan = $("#pelayanan option:selected").data("namapelayanan");
		var harga_pelayanan = $("#pelayanan option:selected").data("harga");
		var quantity = $("#quantity").val();
		$.ajax({
			url: base_url + "transaksi/add_to_cart",
			method: "POST",
			data: {
				id_pelayanan: idpelayanan,
				kode_pelayanan: kodepelayanan,
				nama_pelayanan: namapelayanan,
				harga_pelayanan: harga_pelayanan,
				quantity: quantity,
			},
			success: function (data) {
				$("#detail_cart").html(data);
			},
		});
	});

	// Load shopping cart
	$("#detail_cart").load(base_url + "transaksi/load_cart");

	//Hapus Item Cart
	$(document).on("click", ".hapus_cart", function () {
		var row_id = $(this).attr("id"); //mengambil row_id dari artibut id
		$.ajax({
			url: base_url + "transaksi/hapus_cart",
			method: "POST",
			data: {
				row_id: row_id,
			},
			success: function (data) {
				$("#detail_cart").html(data);
				$("#invoice_cart").html(data);
			},
		});
	});

	// Save, Post dan struk data transaksi
	$("#save-data").click(function () {
		var kode_invoice = $("#kode_invoice").val();
		var pelanggan = $("#pelanggan").val();
		var pembayaran = $("#pembayaran").val();
		var tgl_transaksi = $("#tanggal_trs").val();
		$("#tgl_inv").html(moment(tgl_transaksi).format("DD/MMM/YY"));
		$.ajax({
			url: base_url + "transaksi/tambah_transaksi",
			method: "post",
			data: {
				kode_invoice: kode_invoice,
				pelanggan: pelanggan,
				pembayaran: pembayaran,
				tgl_transaksi: tgl_transaksi,
			},
			success: function (data) {
				$.ajax({
					url: base_url + "transaksi/detail_data",
					method: "POST",
					data: {
						kode_invoice: kode_invoice,
					},
					success: function (data) {
						$("#invoice_data").html(data);
						$("#invoiceModal").modal("show");
					},
				});
			},
		});
	});

	// Detail Data Transaksi
	$(document).on("click", "#detail-data", function () {
		var invoice = $(this).data("invoice");
		var tanggal = $(this).data("created");
		var waktu = $(this).data("time");
		$("#kode_invoice").html(invoice);
		$("#tanggal_invoice").html(moment(tanggal).format("DD/MMM/YY"));
		$("#waktu_invoice").html(waktu);
		$.ajax({
			url: base_url + "detailtransaksi/detail_data",
			method: "POST",
			data: {
				invoice: invoice,
			},
			success: function (data) {
				$("#detail_data").html(data);
				$("#detailModal").modal("show");
			},
		});
	});

	// refresh after save
	$("#invoiceModal").on("hidden.bs.modal", function () {
		location.reload();
	});

	// date picker js laporan
	$(function () {
		$("#start_date").datepicker({
			dateFormat: "yy-mm-dd",
		});
		$("#end_date").datepicker({
			dateFormat: "yy-mm-dd",
		});
		$("#tanggal_trs").datepicker({
			dateFormat: "yy-mm-dd",
		});
	});
});

// Function cetak struk
function printDiv() {
	var divToPrint = document.getElementById("DivIdToPrint");
	var newWin = window.open("", "Print-Window");
	newWin.document.open();
	newWin.document.write(
		'<html><head><style>@page {size: A5;} @media print{@page{size: A5 landscape;}}</style></head><body onload="window.print()">' +
			divToPrint.innerHTML +
			"</body></html>"
	);
	newWin.document.close();
	setTimeout(function () {
		newWin.close();
	}, 10);
}
