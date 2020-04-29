# WP Fail2Ban nForced.uk

Custom WordPress plugin to help ban repeat offenders and bots trying to break into wp-login and xmlrpc.php.

## Installation

Install the plugin content to /siteroot/wp-content/plugins/

```
cd /siteroot/wp-content/plugins/
git clone https://github.com/nForced-uk/wp-fail2ban.git --depth=1
```

Next copy over the wordpress-auth filter to the fail2ban configs:

```
cp wp-fail2ban/etc/fail2ban/filter.d/wordpress-auth.conf /etc/fail2ban/filter.d/wordpress-auth.conf
```

Amend the jail.local file to activate and include your access.log file(s)

```
cat wp-fail2ban/etc/fail2ban/jail.d/jail.local
vim /etc/fail2ban/jail.d/jail.local
```
