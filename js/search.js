function search() {
    console.log("Halo")
    var keyword = document.getElementById("searchField").value;

    // Cek jika keyword kosong
    if (keyword.trim() === "") {
      clearDropdown();
      return;
    }
  
    // Buat permintaan Ajax ke server dengan menggunakan framework atau teknologi yang Anda gunakan
    // Misalnya, Anda dapat menggunakan XMLHttpRequest atau jQuery AJAX
  
    // Contoh dengan menggunakan XMLHttpRequest
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "search/cari.php?keyword=" + encodeURIComponent(keyword), true);
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        console.log(xhr.responseText);
        var results = JSON.parse(xhr.responseText);
        updateDropdown(results);
      }
    };
    xhr.send();
  }
  
  function updateDropdown(results) {
    var dropdown = document.getElementById("searchDropdown");
    dropdown.innerHTML = "";
  
    // Tambahkan hasil pencarian ke dalam dropdown
    for (var i = 0; i < results.length; i++) {
      var resultItem = document.createElement("li");
      var resultLink = document.createElement("a");
      resultLink.href = "Main/berita.php?judul=" + encodeURIComponent(results[i]);
      resultLink.textContent = results[i];
      resultItem.appendChild(resultLink);
      dropdown.appendChild(resultItem);
    }
  
    // Tampilkan atau sembunyikan dropdown berdasarkan hasil pencarian
    dropdown.style.display = results.length > 0 ? "block" : "none";
  }
  
  
  
  function clearDropdown() {
    var dropdown = document.getElementById("searchDropdown");
    dropdown.innerHTML = "";
    dropdown.style.display = "none";
  }