# IssFuerMeinABI

A web interface for recording refreshment orders.

## Requirements

* webserver of some type (Apache, XAMPP, php-built-in)
* browser supporting HTML5

## Run

Using the php-built-in server:

```bash
cd src/
php -Slocalhost:8080
```

Then enter `localhost:8080/index.php` in your browser.

Click an item to record it's purchase.

You can find a list of the purchases in `orders.csv` in the format `item, price`.
