# fl newspaper #

Landing page of a newspaper subscription

## Installation ##

```bash
bash bin/install
```

app/config/parameters.yml
```yaml
pay.client_id: E959JAFLSK3995 #yandex money application id
pay.wallet: 28394789263489 # yandex money wallet
pay.price: 1.00 # newspaper price
mail.support: "mrsuh6@gmail.com" # support email
newspaper.file_path: %kernel.root_dir%/newspaper.pdf #path to newspaper file
```