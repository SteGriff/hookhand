# hookhand

**Work in Progress**

Dead simple PHP webhook deploy script.
Works in a Linux shared hosting environment and only needs access to the current directory.
Supports GitHub [X-Hub-Signature][1]

[1]: https://developer.github.com/webhooks/#payloads

## Set up hookhand

### Configure

 * Rename `credentials.example.php` to `credentials.php` and change the deployment key inside the file to a secret value.
 * Alter the `config.php` file to the values you want
 * Upload the files to the target dir
 
### Run Setup

 * Access `hookhand.htm` in a web browser, enter your deployment key and press **Clone**

## Set up GitHub webhooks

Before pushing from GitHub, you need to have run the setup procedure above.

On GitHub:

 * Go to Settings for your repo
 * In the left nav, click Webhooks
 * Add webhook (confirm your password)
 * Set payload URL to your directory's `/deploy.php` 
 * Leave the `content-type` as `x-www-form-urlencoded`
 * Add the `secret` to match `credentials.php`
 * Save the webhook
 