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

* Click the red button at the bottom to reset the customer counter
(only once per event)
* Click an item to add it to the order
* Click the Submit button to record the order

You can find a list of the purchases in `orders.csv`
in the format `"Order ID", Item, Price, Quantity, Timestamp`.

## TODO

* [x] take back the last order
* [x] fenster mit letzten 3 Zeilen aus dem Dokument
