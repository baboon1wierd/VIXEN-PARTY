<?php include '../app/views/partials/header.php'; ?>

<section class="py-16 bg-gray-50">
  <div class="max-w-4xl mx-auto px-6">
    <h1 class="text-4xl font-bold text-center mb-12 text-gray-800">Web Scraped Results</h1>

    <div id="results" class="space-y-4">
      <!-- Results will be loaded here -->
    </div>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
  fetch('../scraped_data.json')
    .then(response => response.json())
    .then(data => {
      const resultsDiv = document.getElementById('results');
      data.forEach(item => {
        const card = document.createElement('div');
        card.className = 'bg-white p-4 rounded-lg shadow-lg';
        card.innerHTML = `
          <div class="flex items-start space-x-4">
            <div class="flex-shrink-0">
              <div class="w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center">
                <span class="text-sm font-bold">${item.platform ? item.platform.charAt(0) : 'W'}</span>
              </div>
            </div>
            <div class="flex-1">
              <h3 class="text-lg font-semibold mb-1"><a href="${item.url}" target="_blank" class="text-blue-600 hover:underline">${item.title}</a></h3>
              <p class="text-gray-600 text-sm mb-2">${item.snippet}</p>
              <div class="flex items-center space-x-4 text-xs text-gray-500">
                <span>${item.platform || 'Web'}</span>
                <a href="${item.url}" target="_blank" class="text-blue-500 hover:underline">View</a>
              </div>
            </div>
          </div>
        `;
        resultsDiv.appendChild(card);
      });
    })
    .catch(error => console.error('Error loading scraped data:', error));
});
</script>

<?php include '../app/views/partials/footer.php'; ?>