function listWords() {
    const urlInput = document.getElementById("urlInput");
    const url = urlInput.value;

    if (!url) {
        alert("Kérjük, adja meg a URL-t!");
        return;
    }

    const listButton = document.getElementById("listButton");
    listButton.disabled = true;

    const loadingSpinner = document.getElementById("loadingSpinner");
    loadingSpinner.style.display = "block";

    fetch(`/process-url?url=${encodeURIComponent(url)}`)
        .then((response) => response.json())
        .then((data) => {
            displayWordList(data.words);
            loadingSpinner.style.display = "none";
            listButton.disabled = false;
        })
        .catch((error) => {
            console.error("Hiba történt:", error);
            loadingSpinner.style.display = "none";
            listButton.disabled = false;
        });
}

function displayWordList(words) {
    const wordList = document.getElementById("wordList");
    wordList.innerHTML = "<h2>Találatok:</h2>";
    const table = document.createElement("table");
    table.border = "1";

    for (let i = 0; i < words.length; i += 8) {
        const row = table.insertRow();
        for (let j = i; j < i + 8 && j < words.length; j++) {
            const cell = row.insertCell();
            cell.textContent = words[j];
        }
    }

    wordList.appendChild(table);
}