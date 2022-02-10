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

namespace Login
{
    /// <summary>
    /// Interaction logic for AddItems.xaml
    /// </summary>
    public partial class AddItems : Window, INotifyPropertyChanged
    {
        public event PropertyChangedEventHandler PropertyChanged;
        protected void OnPropertyChanged([CallerMemberName] string name = null)
        {
            PropertyChanged?.Invoke(this, new PropertyChangedEventArgs(name));
        }

        private ProjectDB _db = new ProjectDB();

        private Employee employee = new Employee();

        public Employee NewEmployee
        {
            get { return employee; }
            set { employee = value; OnPropertyChanged(); }
        }


        public AddItems()
        {
            InitializeComponent();
            DataContext = this;
        }

        private void Button_Click(object sender, RoutedEventArgs e)
        {
            //this is gonna be tricky to do without any old projects open haha
            if (NewEmployee != null)
            {
                _db.CreateEmployee(NewEmployee,Date.SelectedDate.Value);
                MessageBox.Show("Employee " + NewEmployee.FirstName + " " + NewEmployee.LastName + " Aangemaakt");
                NewEmployee = new Employee();
            }
        }

        private void Button_Click_1(object sender, RoutedEventArgs e)
        {

        }
    }
}
