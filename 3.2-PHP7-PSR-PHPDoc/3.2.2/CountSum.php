<?php 
/**
 * class for count price of dishes
 */
class CountSum
{
    /**
     * @var $sum Final sum of all dishes
     * @var $purchase Total amount
     * @var $priceOfDish Price of dish
     * @var $finalPriceOfDish Final price of several dishes
     * @var $services Cafe services
     * @var $service Selected cafe service
     * @var $quantity Quantity of selected dishes
     * @var $numOfOrder Number of order
     */
    
    public $sum;
    public $priceOfDish;
    public $finalPriceOfDish;
    public $services;
    public $service;
    public $quantity;
    public $purchase;
    public $numOfOrder;
    const DEFAULT_SUM = 0;
    const DEFAULT_QUANTITY = 0;
    const DELIVERY = 1;
    const PICKUP = 2;
    const WAITER = 4;
    public function __construct(array $menu, array $post) 
    {
        /**
         * class constructor
         * @param array $menu 
         * @param array $post
         */
        $this->menu = $menu;
        $this->post = $post;
        $this->numOfOrder = random_int(1000, 9999);
        $this->purchase = "<div class=\"order322-line order322-title\">Счёт №$this->numOfOrder</div>";
        $this->sum = self::DEFAULT_SUM;
        $this->quantity = self::DEFAULT_QUANTITY;
        $this->services = (int)$this->post['service'];
    }
    public function countTotalAmount(): string
    {
        /**
         * Count total amount
         * @uses $this->quantity
         */
        foreach ($this->menu as $index) {
            $this->quantity = $this->post[$index->id];
            if ($this->quantity > self::DEFAULT_QUANTITY) {
                $priceOfDish = number_format($index->price, 2);
                $finalPriceOfDish = number_format($index->price * $this->quantity, 2);
                $this->purchase .= "<div class=\"order322-line\"><div>$index->name</div><div>$this->quantity * $priceOfDish ₽ = $finalPriceOfDish ₽</div></div>";
                $this->sum += $finalPriceOfDish;
            }
        }
        /**
         * Count total amount with services
         * @uses int $this->services
         * @uses $this->sum
         * @return string $this->purchase Total amount
         */
        if ($this->sum > self::DEFAULT_SUM) {
            switch ($this->services) {
                case self::DELIVERY:
                    $service = number_format($this->sum * 0.10, 2);
                    $this->purchase .= "<div class=\"order322-line\"><div>Доставка</div><div>200.00 ₽</div></div>";
                    $this->sum = $this->sum + 200;
                    break;
                case self::PICKUP:
                    $service = number_format($this->sum * 0.10, 2);
                    $this->purchase .= "<div class=\"order322-line\"><div>Скидка 10% (самовывоз)</div><div>- $service ₽</div></div>";
                    $this->sum = $this->sum - (float)$service;
                    break;
                case self::WAITER:
                    $service = number_format($this->sum * 0.10, 2);
                    $this->purchase .= "<div class=\"order322-line\"><div>Чаевые 10%</div><div>$service ₽</div></div>";
                    $this->sum = $this->sum + (float)$service;
                    break;
            }
        } else {
            $this->purchase .= "<div class=\"order322-line\">Ничего не заказано</div>";
        } 
        $this->sum = number_format($this->sum, 2);
        $this->purchase .= "<div class=\"order322-total\"><div>Итого: $this->sum ₽</div></div>";
        return $this->purchase;
    }
}