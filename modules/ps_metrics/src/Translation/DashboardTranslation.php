<?php
/**
 * Copyright since 2007 PrestaShop SA and Contributors
 * PrestaShop is an International Registered Trademark & Property of PrestaShop SA
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License version 3.0
 * that is bundled with this package in the file LICENSE.md.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * @author    PrestaShop SA and Contributors <contact@prestashop.com>
 * @copyright Since 2007 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License version 3.0
 */

namespace PrestaShop\Module\Ps_metrics\Translation;

use PrestaShop\Module\Ps_metrics\Context\PrestaShopContext;
use Ps_metrics;

class DashboardTranslation
{
    /**
     * @var Ps_metrics
     */
    private $module;

    /**
     * @var PrestaShopContext
     */
    private $prestashopContext;

    /**
     * __construct
     *
     * @param Ps_metrics $module
     * @param PrestaShopContext $prestashopContext
     *
     * @return void
     */
    public function __construct(Ps_metrics $module, PrestaShopContext $prestashopContext)
    {
        $this->module = $module;
        $this->prestashopContext = $prestashopContext;
    }

    /**
     * Create all translations for Dashboard App
     *
     * @return array
     */
    public function getTranslations()
    {
        $locale = $this->prestashopContext->getLanguageIsoCode();

        $translations[$locale] = [
            'general' => [
                'title' => $this->module->l('PrestaShop Metrics', 'DashboardTranslation'),
                'trustData' => [
                    'text' => $this->module->l('Can I trust the data? Yes, you can!', 'DashboardTranslation'),
                    'link' => $this->module->l('See why', 'DashboardTranslation'),
                ],
                'noData' => $this->module->l('No data available for now', 'DashboardTranslation'),
                'noTipsCard' => $this->module->l('No tips card available for now', 'DashboardTranslation'),
                'noLanguage' => $this->module->l('Looks like we can\'t reach our service right now. Please try again later or contact us if the issue persists.', 'DashboardTranslation'),
                'noActivity' => $this->module->l('You didn\'t get any activity during this period', 'DashboardTranslation'),
            ],
            'incentivePanel' => [
                'title' => $this->module->l('PrestaShop Metrics - A trusted place for your data', 'DashboardTranslation'),
                'gather' => $this->module->l('Gather all your data in one place.', 'DashboardTranslation'),
                'monitor' => $this->module->l('Monitor easily your business on a daily basis.', 'DashboardTranslation'),
                'decisions' => $this->module->l('Make decisions for your business with trusted KPIs.', 'DashboardTranslation'),
                'link' => $this->module->l('Start the setup now', 'DashboardTranslation'),
            ],
            'needGAPanel' => [
                'textContent' => $this->module->l('In order to display sessions and conversion data, you need to configure your google analytics account.'),
                'configure' => $this->module->l('Configure', 'DashboardTranslation'),
            ],
            'dates' => [
                'yesterday' => $this->module->l('Yesterday', 'DashboardTranslation'),
                'last7Days' => $this->module->l('Last 7 days', 'DashboardTranslation'),
                'last30Days' => $this->module->l('Last 30 days', 'DashboardTranslation'),
                'selectOtherDates' => $this->module->l('Select other dates', 'DashboardTranslation'),
                'thismonth' => $this->module->l('This month', 'DashboardTranslation'),
                'lastmonth' => $this->module->l('Last month', 'DashboardTranslation'),
                'last90days' => $this->module->l('Last 90 days', 'DashboardTranslation'),
                'thisweek' => $this->module->l('This week', 'DashboardTranslation'),
                'lastweek' => $this->module->l('Last week', 'DashboardTranslation'),
                'currentPlans' => $this->module->l('Your current plan allows you to analyse data collected during the last 90 days', 'DashboardTranslation'),
                'today' => $this->module->l('Today', 'DashboardTranslation'),
                'to' => $this->module->l('to', 'DashboardTranslation'),
            ],
            'menu' => [
                'activity' => $this->module->l('Activity', 'DashboardTranslation'),
                'grow' => $this->module->l('Grow', 'DashboardTranslation'),
                'configure' => $this->module->l('Configure', 'DashboardTranslation'),
            ],
            'tabsTitle' => [
                'source' => $this->module->l('source | sources', 'DashboardTranslation'),
                'noSource' => $this->module->l('No source', 'DashboardTranslation'),
                'revenues' => $this->module->l('revenue | revenues', 'DashboardTranslation'),
                'revenuesTooltip' => $this->module->l('Sum of revenue, tax + shipping incl., generated within the date range by the orders considered as validated.', 'DashboardTranslation'),
                'orders' => $this->module->l('order | orders', 'DashboardTranslation'),
                'ordersTooltip' => $this->module->l('Total number of orders received within the date range by the orders considered as validated.', 'DashboardTranslation'),
                'visits' => $this->module->l('session | sessions', 'DashboardTranslation'),
                'visitsTooltip' => $this->module->l('Total number of sessions on your store within the date range when one or several pages have been loaded by a user.', 'DashboardTranslation'),
                'visitors' => $this->module->l('User | Users', 'DashboardTranslation'),
                'visitorsTooltip' => $this->module->l('Total distinct users who have visited one or several pages on your store at least once within the date range.', 'DashboardTranslation'),
                'conversionRate' => $this->module->l('conversion rate | conversion rate', 'DashboardTranslation'),
                'conversionRateTooltip' => $this->module->l('Percentage of sessions that resulted in orders, out of the total number of sessions, within the date range.', 'DashboardTranslation'),
                'basedOn' => $this->module->l('based on user | based on users', 'DashboardTranslation'),
                'basedOnTooltip' => $this->module->l('Percentage of users who completed an order, out of the total number of users, within the date range.', 'DashboardTranslation'),
                'sourceRatio' => $this->module->l('Ratio orders/sessions', 'DashboardTranslation'),
            ],
            'tabsBody' => [
                'general' => [
                    'titleInsights_revenue' => $this->module->l('Tips to grow your revenue', 'DashboardTranslation'),
                    'titleInsights_orders' => $this->module->l('Tips to increase your orders', 'DashboardTranslation'),
                    'titleInsights_sessions' => $this->module->l('Tips to drive more sessions', 'DashboardTranslation'),
                    'titleInsights_conversion_rate' => $this->module->l('Tips to improve your conversion rate', 'DashboardTranslation'),
                    'discoverAllInsights' => $this->module->l('Discover more insights', 'DashboardTranslation'),
                    'seeMoreFeatures' => $this->module->l('See more features', 'DashboardTranslation'),
                    'close' => $this->module->l('Close', 'DashboardTranslation'),
                ],
                'dates' => [
                    'hour' => $this->module->l('Hour', 'DashboardTranslations'),
                    'day' => $this->module->l('Day', 'DashboardTranslations'),
                    'week' => $this->module->l('Week', 'DashboardTranslations'),
                    'month' => $this->module->l('Month', 'DashboardTranslations'),
                ],
                'comparePanel' => [
                    'compareWith' => $this->module->l('Compare with', 'DashboardTranslation'),
                    'previousPeriod' => $this->module->l('Previous period', 'DashboardTranslation'),
                    'lastYear' => $this->module->l('Last year', 'DashboardTranslation'),
                    'soon' => $this->module->l('Soon', 'DashboardTranslation'),
                ],
                'revenues' => [
                    'revenuePerCategory' => $this->module->l('Revenue per category', 'DashboardTranslation'),
                    'revenuePerCategoryTooltip' => $this->module->l('Sum of revenue, tax + shipping incl., generated within the date range by the orders considered as validated.', 'DashboardTranslation'),
                    'revenueAnalysis' => $this->module->l('Revenue Analysis', 'DashboardTranslation'),
                    'revenueAnalysisTooltip' => $this->module->l('Sum of tax generated within the date range by the orders considered as validated', 'DasboardTranslation'),
                    'revenueNet' => $this->module->l('NET REVENUE', 'DashboardTranslation'),
                    'totalTaxes' => $this->module->l('TOTAL TAX', 'DashboardTranslation'),
                ],
                'orders' => [
                    'cartAnalysis' => $this->module->l('Cart Analysis', 'DashboardTranslation'),
                    'cartValueAverage' => $this->module->l('AVERAGE ORDER VALUE', 'DashboardTranslation'),
                    'cartValueAverageTooltip' => $this->module->l(' Average value of the orders received within the date range, calculated by dividing Revenue by Orders.', 'DashboardTranslation'),
                    'abandonedCartRate' => $this->module->l('CART ABANDONMENT RATE', 'DashboardTranslation'),
                    'abandonedCartRateTooltip' => $this->module->l('Percentage of shopping carts created by a user and abandoned before completing the purchase.', 'DashboardTranslation'),
                    'seeDetails' => $this->module->l('See details', 'DashboardTranslation'),
                ],
                'visits' => [
                    'trafficPerChannel' => $this->module->l('Traffic per channel', 'DashboardTranslation'),
                    'direct' => $this->module->l('The traffic to your website got from direct access, for example by typing your URL in the browser address bar or via a bookmark.', 'DashboardTranslation'),
                    'referral' => $this->module->l('The traffic to your website got from a backlink on another website', 'DashboardTranslation'),
                    'organic_search' => $this->module->l('The traffic your website got for free from search engines, like Google, Bing, etc.', 'DashboardTranslation'),
                    'paid_search' => $this->module->l('The paid traffic your website got from search engines, like Google from Google Ads', 'DashboardTranslation'),
                    'email' => $this->module->l('The traffic your website got from email marketing campaigns and even email signatures', 'DashboardTranslation'),
                    'social' => $this->module->l('The traffic your website got from social media like Facebook, Twitter, Linkedin, etc.', 'DashboardTranslation'),
                    'display' => $this->module->l('The traffic your website got from display ads on another website', 'DashboardTranslation'),
                    'other' => $this->module->l('The traffic your website got from other channels that could not be identified', 'DashboardTranslation'),
                    'visitAnalysis' => $this->module->l('Visits Analysis', 'DashboardTranslation'),
                    'bounceRate' => $this->module->l('BOUNCE RATE', 'DashboardTranslation'),
                    'averageSessionDuration' => $this->module->l('AVERAGE SESSION DURATION', 'DashboardTranslation'),
                ],
                'conversionRate' => [
                    'loyaltyAnalysis' => $this->module->l('Loyalty analysis', 'DashboardTranslation'),
                    'loyaltyAnalysisTooltip' => $this->module->l('New customers / Customers who already have completed an order on your store before', 'DashboardTranslation'),
                    'repeatCustomers' => $this->module->l('Repeat customers', 'DashboardTranslation'),
                    'newCustomers' => $this->module->l('New customers', 'DashboardTranslation'),
                    'customers_with_orders' => $this->module->l('Repeat customers', 'DashboardTranslation'),
                    'customers_without_orders' => $this->module->l('New customers', 'DashboardTranslation'),
                    'paymentMethods' => $this->module->l('Payment methods', 'DashboardTranslation'),
                    'customer_with_orders_text' => $this->module->l('{valueCustomers}{typeValueCustomers} of your customers are returning customers, they represent {valueRevenues}{typeValueRevenues} of your revenue over the period.', 'DashboardTranslation'),
                    'customer_without_orders_text' => $this->module->l('{valueCustomers}{typeValueCustomers} of your customers are new customers, they represent {valueRevenues}{typeValueRevenues} of your revenue over the period.', 'DashboardTranslation'),
                ],
                'nextFeatures' => [
                    'comingSoon' => $this->module->l('Coming Soon', 'DashboardTranslation'),
                    'tellMeMore' => $this->module->l('Tell me more', 'DashboardTranslation'),
                    'getNotified' => $this->module->l('Receive weekly reportings by email', 'DashboardTranslation'),
                    'getNotifiedModal' => $this->module->l('Keep always up to speed with your last week\'s performance! Our weekly reporting allows you to get a comprehensive, good-looking and insightful report on your activity. Delivered every Monday, right to your inbox.', 'DashboardTranslation'),
                    'exportData' => $this->module->l('Export your data to CSV and PDF files', 'DashboardTranslation'),
                    'exportDataModal' => $this->module->l('Easily export and share your data. Export your data to a .csv file covering all your KPIs within the selected date range and granularity.  Or download your instant .pdf report, ready to share with your team.', 'DashboardTranslation'),
                    'analyseLast15Months' => $this->module->l('Go further with 14 months of data history', 'DashboardTranslation'),
                    'analyseLast15MonthsModal' => $this->module->l('Unlock the power of your data with a 14 months data history. Analyze your performance over more than one year. Combined with our new comparison mode, you will be able to get a year-over-year analysis very easily.', 'DashboardTranslation'),
                    'upcomingFeatures' => $this->module->l('Upcoming features', 'DashboardTranslation'),
                ],
            ],
            'grow' => [
                'title' => $this->module->l('Grow your business', 'DashboardTranslation'),
                'baseline1' => $this->module->l('Let\'s go further together.', 'DashboardTranslation'),
                'baseline2' => $this->module->l('Get some insights and tips to grow your business!', 'DashboardTranslation'),
                'removeFilter' => $this->module->l('Remove filter', 'DashboardTranslation'),
                'filterSelected' => $this->module->l('filter selected', 'DashboardTranslation'),
                'noFilterSelected' => $this->module->l('Select a tag to filter the tips', 'DashboardTranslation'),
                'readMore' => $this->module->l('Read more', 'DashboardTranslation'),
                'modal' => [
                    'close' => $this->module->l('Close', 'DashboardTranslation'),
                    'visitBlog' => $this->module->l('MORE INFORMATION', 'DashboardTranslation'),
                ],
                'buttons' => [
                    'revenue' => $this->module->l('Revenue', 'DashboardTranslation'),
                    'conversion' => $this->module->l('Conversion', 'DashboardTranslation'),
                    'orders' => $this->module->l('Orders', 'DashboardTranslation'),
                    'sessions' => $this->module->l('Sessions', 'DashboardTranslation'),
                ],
            ],
            'alerts' => [
                'disableDashboardModules' => [
                    'text' => $this->module->l('Default PrestaShop statistics blocks are enabled. You can disable them to avoid overloading your dashboard', 'DashboardTranslation'),
                    'cta' => $this->module->l('Click here if you want to disable them', 'DashboardTranslation'),
                ],
                'enableDashboardModules' => [
                    'text' => $this->module->l('Your previous statistics blocks have been disabled to avoid overloading your dashboard', 'DashboardTranslation'),
                    'cta' => $this->module->l('Click here if you want to reactivate', 'DashboardTranslation'),
                ],
            ],
        ];

        return $translations;
    }
}
