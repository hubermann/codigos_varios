## Objective:
  A class for checkout process that allow the scan method for agrupate items inside a shopping process and allow apply discounts in some cases with especial conditions (pricing_rules).

  As the most flexible way for implement different promotions and discounts options, the **Checkout** class is complemented by one class for pricing management (**Pricingrule** class), a class for discounts (**Discount** class) this last is optional as parameters inside the rules according the product and include a method with the capability of incorporate others different classes that can overwrite the *calculate_price* method, and return a specifics price for the type of promotion desire according the products. With this options, is possible create many different promotion rules as been desired.

  test are included for basic checkout process and with this specific parameters:

  >    Items: VOUCHER, TSHIRT, MUG
  >    Total: 32.50$

  >    Items: VOUCHER, TSHIRT, VOUCHER
  >    Total: 25.00$

  >    Items: TSHIRT, TSHIRT, TSHIRT, VOUCHER, TSHIRT
  >    Total: 81.00$

  >    Items: VOUCHER, TSHIRT, VOUCHER, VOUCHER, MUG, TSHIRT, TSHIRT
  >    Total: 74.50$

  *Gabriel Hubermann | 2018*
