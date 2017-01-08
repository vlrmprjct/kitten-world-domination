# KITTEN WORLD DOMINATION

This small piece of php script will post to useless content stream with even more useless content.

![alt text](https://farm3.staticflickr.com/2904/13899639707_b3b2861cf3_b.jpg "Kitten World Domination")

## SETUP

- Clone repository
- run "composer install"
- Create a Flickr App @ 

    https://www.flickr.com/services/apps/create/apply/?
    
- Create a FB App @

    https://developers.facebook.com/
    
- Create an FB Page Access Token @

    https://developers.facebook.com/tools/explorer/
    
    Choose your new app in "Application" dropdown
    
    Choose "User Access Token" 
    
    Click "Submit"
    
    Get a non-expiring Access Token for your App @
    
    https://graph.facebook.com/oauth/access_token?grant_type=fb_exchange_token&client_id=APPID&client_secret=APPSECRET&fb_exchange_token=ACCESSTOKEN

- Add all keys and tokens to config.php
- Add a cron to your server and run it
- Thats all, now you have a bot to flood the fb stream with useless images of yor choice

### PARAMTER

tag: a comma separated list of flickr image tags
fb: post a random image to FB

### USAGE EXAMPLE
Call URL to check output, a list of images will be displayed
http://your-domain.com/kitten-worl-domination/?tag=kitten,blackandwhite

Call URL with "fb" as GET Paramter will add a post with a random image an link to FB
http://your-domain.com/kitten-worl-domination/?tag=kitten,blackandwhite&fb

Replace the tags with you own tags if you want.


## REQUIREMENTS

- Facebook PHP SDK
- A Facebook App
- A Flickr App

## LINKS

- FB:     
    - https://developers.facebook.com/
    - https://developers.facebook.com/tools/explorer/
- FLICKR: 
    - https://www.flickr.com/services/apps/create/apply/?
    - https://www.flickr.com/services/api/flickr.photos.search.html
- MISC:
    - http://256cats.com/flickr-api-example-php-scraping-flickr-images/
    - http://www.adamboother.com/blog/automatically-posting-to-a-facebook-page-using-the-facebook-sdk-v5-for-php-facebook-api/
