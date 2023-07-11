# php-download-image-dari-bot-whatsapp-meta

contoh respon webhook jika ada gambar yang diterima bot

<pre>
{"object":"whatsapp_business_account","entry":[{"id":"1090933255788xx","changes":[{"value":{"messaging_product":"whatsapp","metadata":{"display_phone_number":"628515xxxxx","phone_number_id":"10924711xxxxx"},"contacts":[{"profile":{"name":"biston"},"wa_id":"6285xxxxxx"}],"messages":[{"from":"62xxxxx","id":"wamid.HBgNNjI4NTI0NDIxNDYwMBxxxxxxxxxxxxxxxx","timestamp":"1689116791","type":"image","image":{"mime_type":"image\/jpeg","sha256":"nxX4bDz0OJxea+Hs2QDblxxxxxxxxxxxxxxxx","id":"131135794949xxxx"}}]},"field":"messages"}]}]}				
</pre><br><br>
contoh ambil id-gambar (idd) <br><br>
$idd = $dx['entry'][0]['changes'][0]['value']['messages'][0]['image']['id']

<img src='json.jpg'>
