# Terms of service


> ![](https://raw.githubusercontent.com/nextcloud/terms_of_service/master/docs/popup-dialog.png)
> 
> Requires users to accept the terms of service before accessing data.

## more settings

Some options are not available in the Admin Settings page but can be enable using the **./occ** command.

- _Displaying the ToS popup on public shares (links or mails, with or without password protection):_

>        ./occ config:app:set --value '1' terms_of_service tos_on_public_shares


## Build Setup

``` bash
# set up and build for production
make

# install dependencies
make dev-setup

# build for dev and watch changes
make watch-js

# build for dev
make build-js

# build for production with minification
make build-js-production
```

