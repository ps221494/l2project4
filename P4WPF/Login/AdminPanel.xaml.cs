using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Shapes;
using Login.Models;
using System.Runtime.CompilerServices;
using System.Collections.ObjectModel;
using System.ComponentModel;
using System.Data;


namespace Login
{
    /// <summary>
    /// Interaction logic for AdminPanel.xaml
    /// </summary>
    public partial class AdminPanel : Window, INotifyPropertyChanged
    {
        public event PropertyChangedEventHandler PropertyChanged;
        protected void OnPropertyChanged([CallerMemberName] string name = null)
        {
            PropertyChanged?.Invoke(this, new PropertyChangedEventArgs(name));
        }

        ProjectDB _db = new ProjectDB();

        private ObservableCollection<Employee> _LstEmployee = new ObservableCollection<Employee>();

        public ObservableCollection<Employee> LSTEmployee
        {
            get { return _LstEmployee; }
            set { _LstEmployee = value; OnPropertyChanged("LSTEmployee"); }
        }

        private ObservableCollection<pizzas> _ObcPizzas = new ObservableCollection<pizzas>();

        public ObservableCollection<pizzas> ObsCPizza
        {
            get { return _ObcPizzas; }
            set { _ObcPizzas = value;}
        }


        public AdminPanel()
        {
            InitializeComponent();
            TXTtoshow.Text = "1";
            this.DataContext = this;
            FillDG();
        }
        private void FillDG()
        {
            switch (TXTtoshow.Text)
            {
                case "1":
                    LstvPizza.Visibility = Visibility.Hidden;
                    DGmedewerkers.Visibility = Visibility.Visible;
                    LSTEmployee.Clear();
                    foreach (Employee item in _db.GetEmployeeDetails())
                    {
                           LSTEmployee.Add(item);
                    }
                    break;
                case "2":
                    LstvPizza.Visibility = Visibility.Visible;
                    DGmedewerkers.Visibility = Visibility.Hidden;
                    ObsCPizza.Clear();
                    foreach (pizzas item in _db.SelectPizzas())
                    {
                        ObsCPizza.Add(item);
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
        private void AddItem(object sender, RoutedEventArgs e)
        {
            AddItems itemwin = new AddItems();
            itemwin.Show();
        }
        
        private void Logout(object sender, RoutedEventArgs e)
        {
            MainWindow loginscreen = new MainWindow();

            loginscreen.Show();
            this.Close();
        }

        private void selectEmpoley_Click(object sender, RoutedEventArgs e)
        {
            Employee employee = (Employee)DGmedewerkers.SelectedItem;
            EditEmployee editEmployee = new EditEmployee(employee);
            editEmployee.Show();

        }

        private void deleteEmpoley_Click(object sender, RoutedEventArgs e)
        {
            Employee employee = (Employee)DGmedewerkers.SelectedItem;
            if (employee != null)
            {
                _db.DeleteEmployee(employee.Id.ToString());
                OnPropertyChanged("LSTEmployee");
            }
            else
            {
                MessageBox.Show("Je hebt geen medewerker gekozen om te verwijderen");
            }
        }
    }
}
