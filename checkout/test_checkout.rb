require 'test/unit'
require './checkout.rb'
class TestCheckout < Test::Unit::TestCase

  PRICING_RULES = {
    'VOUCHER' => Pricerule.new(5, Discount.new(Dosxuno.new)),
    'TSHIRT' => Pricerule.new(20, Discount.new(Porcentual.new)),
    'MUG' => Pricerule.new(7.5),
  }

  def test_one_voucher
    def voucher_one
      co = Checkout.new(PRICING_RULES)
      co.scan("VOUCHER")
      co.total
    end

    assert_equal( 5, voucher_one)
  end

  def test_three_vouchers
    def voucher_three
      co = Checkout.new(PRICING_RULES)
      3.times { co.scan("VOUCHER") }
      co.total
    end

    assert_equal( 10, voucher_three)
  end

  def test_five_vouchers
    def voucher_five
      co = Checkout.new(PRICING_RULES)
      5.times { co.scan("VOUCHER") }
      co.total
    end

    assert_equal( 15, voucher_five)
  end

  def test_one_shirt
    def one_shirt
      co = Checkout.new(PRICING_RULES)
      1.times { co.scan("TSHIRT") }
      co.total
    end

    assert_equal( 20, one_shirt)
  end

  def test_three_shirts
    def three_shirts
      co = Checkout.new(PRICING_RULES)
      3.times { co.scan("TSHIRT") }
      co.total
    end

    assert_equal( 57, three_shirts)
  end

  def test_one_mug
    def one_mug
      co = Checkout.new(PRICING_RULES)
      1.times { co.scan("MUG") }
      co.total
    end

    assert_equal( 7.5, one_mug)
  end

  def test_three_mugs
    def three_mugs
      co = Checkout.new(PRICING_RULES)
      3.times { co.scan("MUG") }
      co.total
    end

    assert_equal( 22.5, three_mugs)
  end

  def test_buy_one
    # Items: VOUCHER, TSHIRT, MUG
    # Total: 32.50$
    def scan_items
      co = Checkout.new(PRICING_RULES)
      co.scan("VOUCHER")
      co.scan("TSHIRT")
      co.scan("MUG")
      co.total
    end

    assert_equal( 32.5, scan_items)
  end

  def test_buy_two
    # Items: VOUCHER, TSHIRT, VOUCHER
    # Total: 25.00$
    def scan_items
      co = Checkout.new(PRICING_RULES)
      co.scan("VOUCHER")
      co.scan("TSHIRT")
      co.scan("VOUCHER")
      co.total
    end

    assert_equal( 25, scan_items)
  end

  def test_buy_three
    # Items: TSHIRT, TSHIRT, TSHIRT, VOUCHER, TSHIRT
    # Total: 81.00$
    def scan_items
      co = Checkout.new(PRICING_RULES)
      co.scan("TSHIRT")
      co.scan("TSHIRT")
      co.scan("TSHIRT")
      co.scan("VOUCHER")
      co.scan("TSHIRT")
      co.total
    end

    assert_equal( 81, scan_items)
  end

  def test_buy_four
    # Items: VOUCHER, TSHIRT, VOUCHER, VOUCHER, MUG, TSHIRT, TSHIRT
    # Total: 74.50$
    def scan_items
      co = Checkout.new(PRICING_RULES)
      co.scan("VOUCHER")
      co.scan("TSHIRT")
      co.scan("VOUCHER")
      co.scan("VOUCHER")
      co.scan("MUG")
      co.scan("TSHIRT")
      co.scan("TSHIRT")
      co.total
    end

    assert_equal( 74.5, scan_items)
  end

end
