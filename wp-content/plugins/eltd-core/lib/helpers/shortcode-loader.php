<?php
namespace KendallElated\Modules\Shortcodes\Lib;

use KendallElated\Modules\Shortcodes\Accordion\Accordion;
use KendallElated\Modules\Shortcodes\AccordionTab\AccordionTab;
use KendallElated\Modules\Shortcodes\Blockquote\Blockquote;
use KendallElated\Modules\Shortcodes\BlogList\BlogList;
use KendallElated\Modules\Shortcodes\Button\Button;
use KendallElated\Modules\Shortcodes\CallToAction\CallToAction;
use KendallElated\Modules\Shortcodes\Counter\Countdown;
use KendallElated\Modules\Shortcodes\Counter\Counter;
use KendallElated\Modules\Shortcodes\CustomFont\CustomFont;
use KendallElated\Modules\Shortcodes\Dropcaps\Dropcaps;
use KendallElated\Modules\Shortcodes\ElementsHolder\ElementsHolder;
use KendallElated\Modules\Shortcodes\ElementsHolderItem\ElementsHolderItem;
use KendallElated\Modules\Shortcodes\GoogleMap\GoogleMap;
use KendallElated\Modules\Shortcodes\Highlight\Highlight;
use KendallElated\Modules\Shortcodes\Icon\Icon;
use KendallElated\Modules\Shortcodes\IconListItem\IconListItem;
use KendallElated\Modules\Shortcodes\IconWithText\IconWithText;
use KendallElated\Modules\Shortcodes\ImageGallery\ImageGallery;
use KendallElated\Modules\Shortcodes\Message\Message;
use KendallElated\Modules\Shortcodes\OrderedList\OrderedList;
use KendallElated\Modules\Shortcodes\PieCharts\PieChartBasic\PieChartBasic;
use KendallElated\Modules\Shortcodes\PieCharts\PieChartDoughnut\PieChartDoughnut;
use KendallElated\Modules\Shortcodes\PieCharts\PieChartDoughnut\PieChartPie;
use KendallElated\Modules\Shortcodes\PieCharts\PieChartWithIcon\PieChartWithIcon;
use KendallElated\Modules\Shortcodes\PriceList\PriceList;
use KendallElated\Modules\Shortcodes\PriceListItem\PriceListItem;
use KendallElated\Modules\Shortcodes\PricingTables\PricingTables;
use KendallElated\Modules\Shortcodes\PricingTable\PricingTable;
use KendallElated\Modules\Shortcodes\Product\Product;
use KendallElated\Modules\Shortcodes\ProgressBar\ProgressBar;
use KendallElated\Modules\Shortcodes\Separator\Separator;
use KendallElated\Modules\Shortcodes\SocialShare\SocialShare;
use KendallElated\Modules\Shortcodes\Tabs\Tabs;
use KendallElated\Modules\Shortcodes\Tab\Tab;
use KendallElated\Modules\Shortcodes\Team\Team;
use KendallElated\Modules\Shortcodes\UnorderedList\UnorderedList;
use KendallElated\Modules\Shortcodes\VideoButton\VideoButton;
use KendallElated\Modules\Shortcodes\Process\ProcessHolder;
use KendallElated\Modules\Shortcodes\Process\Process;
use KendallElated\Modules\Shortcodes\BlogCarousel\BlogCarousel;
use KendallElated\Modules\Shortcodes\InfoBox\InfoBox;
use KendallElated\Modules\Shortcodes\SectionTitle\SectionTitle;
use KendallElated\Modules\Shortcodes\ProductList\ProductList;
use KendallElated\Modules\Shortcodes\ReservationForm\ReservationForm;


/**
 * Class ShortcodeLoader
 */
class ShortcodeLoader {
	/**
	 * @var private instance of current class
	 */
	private static $instance;
	/**
	 * @var array
	 */
	private $loadedShortcodes = array();

	/**
	 * Private constuct because of Singletone
	 */
	private function __construct() {}

	/**
	 * Private sleep because of Singletone
	 */
	private function __wakeup() {}

	/**
	 * Private clone because of Singletone
	 */
	private function __clone() {}

	/**
	 * Returns current instance of class
	 * @return ShortcodeLoader
	 */
	public static function getInstance() {
		if(self::$instance == null) {
			return new self;
		}

		return self::$instance;
	}

	/**
	 * Adds new shortcode. Object that it takes must implement ShortcodeInterface
	 * @param ShortcodeInterface $shortcode
	 */
	private function addShortcode(ShortcodeInterface $shortcode) {
		if(!array_key_exists($shortcode->getBase(), $this->loadedShortcodes)) {
			$this->loadedShortcodes[$shortcode->getBase()] = $shortcode;
		}
	}

	/**
	 * Adds all shortcodes.
	 *
	 * @see ShortcodeLoader::addShortcode()
	 */
	private function addShortcodes() {
		$this->addShortcode(new Accordion());
		$this->addShortcode(new AccordionTab());
		$this->addShortcode(new Blockquote());
		$this->addShortcode(new BlogList());
		$this->addShortcode(new Button());
		$this->addShortcode(new CallToAction());
		$this->addShortcode(new Counter());
		$this->addShortcode(new Countdown());
		$this->addShortcode(new CustomFont());
		$this->addShortcode(new Dropcaps());
		$this->addShortcode(new ElementsHolder());
		$this->addShortcode(new ElementsHolderItem());
		$this->addShortcode(new GoogleMap());
		$this->addShortcode(new Highlight());
		$this->addShortcode(new Icon());
		$this->addShortcode(new IconListItem());
		$this->addShortcode(new IconWithText());
		$this->addShortcode(new ImageGallery());
		$this->addShortcode(new Message());
		$this->addShortcode(new OrderedList());
		$this->addShortcode(new PieChartBasic());
		$this->addShortcode(new PieChartPie());
		$this->addShortcode(new PieChartDoughnut());
		$this->addShortcode(new PieChartWithIcon());
		$this->addShortcode(new PricingTables());
		$this->addShortcode(new PricingTable());
		$this->addShortcode(new ProgressBar());
		$this->addShortcode(new Separator());
		$this->addShortcode(new SocialShare());
		$this->addShortcode(new Tabs());
		$this->addShortcode(new Tab());
		$this->addShortcode(new Team());
		$this->addShortcode(new UnorderedList());
		$this->addShortcode(new VideoButton());
		$this->addShortcode(new ProcessHolder());
		$this->addShortcode(new Process());
		$this->addShortcode(new BlogCarousel());
		$this->addShortcode(new InfoBox());
		$this->addShortcode(new SectionTitle());
		$this->addShortcode(new PriceList());
		$this->addShortcode(new PriceListItem());
		$this->addShortcode(new Product());
		$this->addShortcode(new ProductList());
		$this->addShortcode(new ReservationForm());
	}

	/**
	 * Calls ShortcodeLoader::addShortcodes and than loops through added shortcodes and calls render method
	 * of each shortcode object
	 */
	public function load() {
		$this->addShortcodes();

		foreach ($this->loadedShortcodes as $shortcode) {
			add_shortcode($shortcode->getBase(), array($shortcode, 'render'));
		}
	}
}

$shortcodeLoader = ShortcodeLoader::getInstance();
$shortcodeLoader->load();