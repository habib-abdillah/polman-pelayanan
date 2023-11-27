// Sweetalert2
const flashData = $(".flash-data").data("flashdata");

if (flashData) {
	Swal.fire({
		position: "top-end",
		icon: "success",
		title: "Data Berhasil " + flashData,
		showConfirmButton: false,
		timer: 1000,
	});
}

$(".tombol-hapus").on("click", function (e) {
	e.preventDefault();
	const href = $(this).attr("href");

	Swal.fire({
		title: "Apakah anda yakin?",
		text: "Data akan dihapus!",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Hapus data!",
	}).then((result) => {
		if (result.isConfirmed) {
			document.location.href = href;
		}
	});
});
