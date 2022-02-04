using Login.Models;
using System.Collections.ObjectModel;
using System.ComponentModel;
using System.Runtime.CompilerServices;
using System.Windows;

namespace Login
{
    /// <summary>
    /// Interaction logic for NewPizzaWin.xaml
    /// </summary>
    public partial class NewPizzaWin : Window, INotifyPropertyChanged
    {
        public event PropertyChangedEventHandler PropertyChanged;
        protected void OnPropertyChanged([CallerMemberName] string name = null)
        {
            PropertyChanged?.Invoke(this, new PropertyChangedEventArgs(name));
        }

        private ObservableCollection<Ingredient> obsIngredientList = new ObservableCollection<Ingredient>();

        private ObservableCollection<Ingredient> InGredients
        {
            get { return obsIngredientList; }
            set { obsIngredientList = value; }
        }

        private ObservableCollection<User_Roles> obsUserlist = new ObservableCollection<User_Roles>();

        private ObservableCollection<User_Roles> Users
        {
            get { return obsUserlist; }
            set { obsUserlist = value; }
        }



        ProjectDB _db = new ProjectDB();


        public NewPizzaWin()
        {
          
            InitializeComponent();
            PopulateIngredient();
            DataContext = this;
        }

        public void PopulateIngredient()
        {
            foreach (Ingredient item in _db.GetAllIngredients())
            {
                InGredients.Add(item);
            }

            foreach (User_Roles item in _db.GetUsers())
            {
                Users.Add(item);
            }


        }


    }
}
