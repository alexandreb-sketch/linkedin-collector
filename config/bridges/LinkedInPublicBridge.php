<?php
class LinkedInPublicBridge extends BridgeAbstract {
    const NAME = 'LinkedIn Public Posts';
    const URI = 'https://www.linkedin.com/';
    const DESCRIPTION = 'Extrait des posts visibles (profil ou page) sans authentification';
    const PARAMETERS = [[
        'u'     => ['name' => 'Profile/Page URL', 'type' => 'text', 'required' => true, 'exampleValue' => 'https://www.linkedin.com/company/google/'],
        'limit' => ['name' => 'Limit', 'type' => 'number', 'required' => false, 'defaultValue' => 10],
    ]];

    public function collectData() {
        $url = $this->getInput('u');
        $limit = min(50, max(1, (int)($this->getInput('limit') ?? 10)));

        $html = getSimpleHTMLDOM($url);
        if (!$html) return;

        // Sélecteurs indicatifs (à ajuster si LinkedIn change le DOM public)
        $cards = $html->find('div.feed-shared-update-v2, div.feed-shared-update');
        $count = 0;

        foreach ($cards as $card) {
            if ($count >= $limit) break;

            $titleNode = $card->find('span[dir=ltr]', 0);
            $linkNode  = $card->find('a.app-aware-link', 0);
            $textNode  = $card->find('div.update-components-text, div.feed-shared-inline-show-more-text', 0);

            $item = [];
            $item['title']     = $titleNode ? trim($titleNode->plaintext) : 'Post LinkedIn';
            $item['uri']       = $linkNode ? $linkNode->href : $url;
            $item['content']   = $textNode ? $textNode->innertext : '';
            $item['timestamp'] = time(); // faute de meilleure date fiable en statique

            $this->items[] = $item;
            $count++;
        }
    }
}
