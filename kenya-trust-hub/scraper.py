import requests
from bs4 import BeautifulSoup
import json
import time

def search_google(query, num_results=10):
    headers = {
        'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'
    }
    url = f"https://www.google.com/search?q={query}&num={num_results}"
    response = requests.get(url, headers=headers)
    soup = BeautifulSoup(response.text, 'html.parser')

    results = []
    for g in soup.find_all('div', class_='g'):
        title = g.find('h3')
        link = g.find('a')
        snippet = g.find('span', class_='aCOpRe')
        if title and link:
            results.append({
                'title': title.text,
                'url': link['href'],
                'snippet': snippet.text if snippet else ''
            })
    return results

def scrape_social_media(keyword):
    # Placeholder for social media scraping
    # In real implementation, use APIs like Twitter API, Facebook Graph API, etc.
    # For demo, simulate
    return [
        {
            'platform': 'Twitter',
            'title': f'Tweet about {keyword}',
            'url': f'https://twitter.com/search?q={keyword}',
            'snippet': f'Some tweet content related to {keyword}'
        },
        {
            'platform': 'Facebook',
            'title': f'Post about {keyword}',
            'url': f'https://www.facebook.com/search/posts?q={keyword}',
            'snippet': f'Some post content related to {keyword}'
        }
    ]

def main():
    keywords = [
        'consumer protection Kenya',
        'scams in Nairobi',
        'lost items Kenya',
        'found items Nairobi',
        'consumer complaints Kenya',
        'fraud alerts Kenya'
    ]

    all_results = []
    for keyword in keywords:
        print(f"Searching for: {keyword}")
        google_results = search_google(keyword, 5)
        social_results = scrape_social_media(keyword)
        all_results.extend(google_results)
        all_results.extend(social_results)
        time.sleep(1)  # Respectful delay

    # Remove duplicates based on URL
    unique_results = []
    seen_urls = set()
    for result in all_results:
        if result['url'] not in seen_urls:
            unique_results.append(result)
            seen_urls.add(result['url'])

    # Save to JSON
    with open('scraped_data.json', 'w') as f:
        json.dump(unique_results, f, indent=2)

    print(f"Scraped {len(unique_results)} unique results")

if __name__ == "__main__":
    main()