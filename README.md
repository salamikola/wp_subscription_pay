# wp_subscription_pay_user_creation_on_order

- create a function to hook into an order creation event.
- Parse the subscription object as a parameter to the function
- Check if the email of the user creating the order already exist
- if the user does not exist, create the user
- Send a welcome notification
