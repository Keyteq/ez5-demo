# Installation guide

1. Create a new git repository: "my-project-name"

2. Checkout keyteq-ez5-skeleton
<pre><code>git clone git@github.com:Keyteq/keyteq-ez5-skeleton.git my-project-name
cd ./my-project-name
git remote set-url origin git@github.com:Keyteq/my-project-name.git
git push origin master
</code></pre>
3. Run composer
<pre><code>php composer.phar install
php composer.phar update
</code></pre>
4. If no virtualhost or other webarea created, do so now. Point to content of web folder.

5. Setup appropriate redirect rules for eZ Publish 5. Either vhost-conf or htaccess

6. If initial install of project, continue reading, else you can go ahead and code.


Known issue:
image magick path can differ between the different environments. Check ezpublish.yml
