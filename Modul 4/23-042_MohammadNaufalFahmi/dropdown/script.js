document.addEventListener('DOMContentLoaded', function() {
    var dropdownButton = document.getElementById('dropbtn');
    var dropdownContent = document.querySelector('.navbar-nav');
    var dropdownContainer = document.querySelector('.dropdown');  

    // Memastikan dropdown disembunyikan pada saat halaman dimuat
    hideDropdown();

    // Fungsi untuk menampilkan atau menyembunyikan dropdown
    function toggleDropdown() {
        if (dropdownContent.style.display === 'block') {
            hideDropdown();
        } else {
            showDropdown();
        }
    }

    // menyembunyikan dropdown
    function hideDropdown() {
        dropdownContent.style.display = 'none';
        dropdownContainer.classList.remove('active');  // Mengatur caret ke posisi default
    }

    // menampilkan dropdown
    function showDropdown() {
        dropdownContent.style.display = 'block';
        dropdownContainer.classList.add('active');  // Mengubah posisi caret
    }

    dropdownButton.onclick = function(event) {
        toggleDropdown();
        event.stopPropagation();  // Menghentikan propagasi event
    }

    // Menutup dropdown jika klik di luar dropdown
    window.onclick = function(event) {
        if (!event.target.matches('#dropbtn')) {
            hideDropdown();
        }
    }
});
