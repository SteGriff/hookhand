# hookhand

**Work in Progress**

Dead simple PHP webhook deploy script. Works in a Linux shared hosting environment and only needs access to the current directory.

## Setup

### Setting up hookhand

 * Rename `credentials.example.php` to `credentials.php` and change the deployment key inside the file to a secret value.
 * Alter the `config.php` file to the values you want
 * Upload the files to the target dir
 * Access `setup.htm` in a web browser, enter your deployment key and press **Clone**

### Setting up GitHub webhooks

On GitHub:

 * Go to Settings
 * In the left nav, click Webhooks
 * Add webhook (confirm your password)
 * Set payload URL to your directory, `/deploy.php?key={your key}` 
     + In future I will improve this to support `[X-Hub-Signature][1]`
 
 

 
[1]: https://developer.github.com/webhooks/#payloads