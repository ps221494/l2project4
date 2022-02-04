using System.Data;
using System.Windows;
using Login.Models;

namespace Login
{
    /// <summary>
    /// Interaction logic for AdminPanel.xaml
    /// </summary>
    public partial class AdminPanel : Window
    {
        ProjectDB _db = new ProjectDB();


        public AdminPanel()
        {
            InitializeComponent();
            FillDG();
        }
        private void FillDG()
        {
            switch (TXTtoshow.Text)
            {
                case "1":
                    DataTable MedewerkersTable = _db.SelectMedewerkers();
                    if (MedewerkersTable != null)
                    {
                        DGmedewerkers.ItemsSource = MedewerkersTable.DefaultView;
                    }
                    break;
                case "2":
                    DataTable PizzaTable = _db.SelectPizzas();
                    if (PizzaTable != null)
                    {
                        DGmedewerkers.ItemsSource = PizzaTable.DefaultView;
                    }
                    break;
            }

        }

        private void BtnShowMW(object sender, RoutedEventArgs e)
        {
            TXTtoshow.Text = "1";
            FillDG();
        }

        private void BtnShowPizza(object sender, RoutedEventArgs e)
        {
            TXTtoshow.Text = "2";
            FillDG();
        }

        private void AddPizza(object sender, RoutedEventArgs e)
        {
            NewPizzaWin pizzawin = new NewPizzaWin();
            pizzawin.Show();
        }
        public void BtnVerwijder_click(object sender, RoutedEventArgs e)
        {

            FillDG();
        }
        public void BtnWijzig_click(object sender, RoutedEventArgs e)
        {

            FillDG();
        }
        private void Logout(object sender, RoutedEventArgs e)
        {
            MainWindow loginscreen = new MainWindow();

            loginscreen.Show();
            this.Close();
        }
    }
}
