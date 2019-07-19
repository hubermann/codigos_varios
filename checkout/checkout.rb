class Checkout
  attr_accessor :rules
  def initialize(rules)
    @rules = rules
    @products = {}
  end

  def scan(product)
    @products[product] ||= 0
    @products[product] += 1
  end

  def total
    @products.inject(0) do |result, (item, q)|
      result + calculate_price(item, q)
    end
  end

  private
  def calculate_price(i,q)
    if include_promotion(i)
      include_promotion(i).price_for(i,q)
    else
      raise "Ooops! this is a not registered item => '#{i}'"
    end
  end

  def include_promotion(item)
    @rules[item]
  end

end


class Pricerule
  attr_accessor :price, :discounts
  def initialize(price, *discounts)
    @price = price
    @discounts = discounts
  end

  def price_for(item,quantity)
    quantity * price - discount_for(item,quantity)
  end

  def discount_for(item, quantity)
    @discounts.inject(0) do |mem, discount|
      mem + discount.calculate_for(price,quantity)
    end
  end

end


class Discount
  attr_accessor :type
  def initialize(type)
    @type = type
  end

  def calculate_for(price, quantity)
    return 0 if type.nil?
    type.calculate_with_promotion(price,quantity)
  end

end


class Dosxuno
  def calculate_with_promotion(price,quantity)
    if quantity >= 2
      quantity -= 1 if quantity.odd?
      total = (quantity * price) / 2
    else
      0
    end
  end
end


class Porcentual
  PORCENTUAL = 0.05
  def calculate_with_promotion(price,quantity)
    if quantity >= 3 then ((quantity*price) * PORCENTUAL) else 0 end
  end
end
