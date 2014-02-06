class RemoveSubdomainFromSchools < ActiveRecord::Migration
  def change
    remove_column :schools, :subdomain, :string
  end
end
